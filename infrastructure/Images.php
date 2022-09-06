<?php

namespace infrastructure;

use App\Models\Image;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use infrastructure\Facades\FileFacade;
use Intervention\Image\ImageManager;

/**
 * Image
 * php version 8
 *
 * @category Image
 * @package  Zend_Service_DeveloperGarden
 * @author   Spera Labs <contact@cyberelysium.com>
 * @license  cyberelysium.com/ Config
 * @link     cyberelysium.com/
 * */
class Images
{

    protected $image_path;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->image_path = public_path(Config::get('images.upload_path'));
    }
    /**
     * Upload the uploaded file to specific path.
     *
     * @param User $user
     * @param $file
     * @param $thumb_sizes
     * @return string - Generated file name.
     */
    public function up($file, $thumb_sizes, $name = null)
    {

        if ($name) {
            $renamed_uploaded_file = FileFacade::makeGivenName($file, $name);
        } else {

            $renamed_uploaded_file = FileFacade::makeName($file);
        }
        if ($file->move($this->image_path . '/', $renamed_uploaded_file)) {

            foreach ($thumb_sizes as $size) {
                $this->saveThumb($renamed_uploaded_file, $size);
            }

            return $this->makeObject($renamed_uploaded_file);
        }
    }

    public function getThumbSize($size_type)
    {
        return Config::get('images.' . $size_type);
    }

    /**
     * Save image thumbnail
     * @param $file
     * @param $size_type
     */
    public function saveThumb($file, $size_type)
    {
        $manager = new ImageManager(array('driver' => Config::get('images.driver')));
        $image = $manager->make($this->image_path . '/' . $file);
        $size = $this->getThumbSize($size_type);

        /**
         * Resize image with maintaining aspect ratio
         */
        if ($image->getWidth() > $image->getHeight()) {
            $image->resize(null, $size['height'], function ($image) {
                $image->aspectRatio();
            });
            $image->crop($size['width'], $size['height'], intval(($image->getWidth() - $size['width']) / 2), 0);
        } else {
            $image->resize($size['width'], null, function ($image) {
                $image->aspectRatio();
            });
            $image->crop($size['width'], $size['height'], 0, intval(($image->getHeight() - $size['height']) / 2));
        }

        if (!file_exists($this->image_path . '/thumb')) {
            File::makeDirectory($this->image_path . '/thumb');
        }

        if (!file_exists($this->image_path . '/thumb/' . $size['width'] . 'x' . $size['height'])) {
            File::makeDirectory($this->image_path . '/thumb/' . $size['width'] . 'x' . $size['height']);
        }

        $image->save($this->image_path . '/thumb/' . $size['width'] . 'x' . $size['height'] . '/' . $file);
    }

    /**
     * Function to delete images from the directory and database
     * @param $id
     * @param $sizes
     * @internal param $file
     */
    public function delete($id, $sizes)
    {

        /**
         * Find image using id
         */
        $image = Image::find($id);

        /**
         * Delete image from directory
         */
        File::delete($this->image_path . '/' . $image->name);

        /**
         * Delete image thumbnails from directories
         */
        foreach ($sizes as $size_type) {
            $size = $size = $this->getThumbSize($size_type);
            File::delete($this->image_path . '/thumb/' . $size['width'] . 'x' . $size['height'] . '/' . $image->name);
        }

        /**
         * Remove image from the database
         */
        Image::destroy($id);
    }

    /**
     * Function to delete image from the directory
     * @param $name
     * @param $sizes
     */
    public function clear($name, $sizes)
    {
        File::delete($this->image_path . '/' . $name);

        /**
         * Delete image thumbnail from directory
         */
        foreach ($sizes as $size_type) {
            $size = $size = $this->getThumbSize($size_type);
            File::delete($this->image_path . '/thumb/' . $size['width'] . 'x' . $size['height'] . '/' . $name);
        }
    }

    /**
     * Get image name from uploaded image list string.
     *
     * @param $array_list
     *
     * @return array
     */
    public function get($array_list)
    {
        return explode(',', $array_list);
    }

    /**
     * Download Facebook profile image from profile ID
     *
     * @param $contents
     * @param $thumb_sizes
     * @internal param $fb_id
     * @return string
     */
    public function downloadImage($contents, $thumb_sizes)
    {

        $new_image_name = FileFacade::makeName() . ".jpg";

        //Store in the filesystem
        FileFacade::storeFile($contents, $new_image_name, $this->image_path, "w");

        foreach ($thumb_sizes as $size) {
            $this->saveThumb($new_image_name, $size);
        }

        return $this->makeObject($new_image_name);
    }

    /**
     * Store many of images provided as an array
     * Returns stored image names
     * @param $images
     * @param $thumb_sizes
     * @return array
     */
    public function store($images, $thumb_sizes)
    {
        $response = [];
        $status = false;
        $created_images = [];
        $error = null;

        if ($images != null) {
            if (is_array($images)) {
                foreach ($images as $image) {

                    /**
                     * Uploading file using ImagesFacade
                     * Get uploaded file name and assign to $file name variable
                     */
                    $file = $this->up($image, $thumb_sizes);

                    array_push($created_images, $file);
                }
            } else {
                $created_images = $this->up($images, $thumb_sizes);
            }

            $status = true;
        } else {
            $error = "Please add at least one image to upload";
        }

        $response['status'] = $status;
        $response['error'] = $error;
        $response['created_images'] = $created_images;

        return $response;
    }

    /**
     * Crop image
     * @param $id
     * @param array $image_details
     * @param array $image_sizes
     */
    public function crop($id, array $image_details, array $image_sizes)
    {
        $file_name = Image::find($id)->name;
        $manager = new ImageManager(array('driver' => Config::get('images.driver')));
        $image = $manager->make($this->image_path . '/' . $file_name);
        $image->crop(
            intval($image_details['width']),
            intval($image_details['height']),
            intval($image_details['x']),
            intval($image_details['y'])
        );
        $image->save($this->image_path . '/' . $file_name);

        /**
         * Replace image thumbs with cropped image
         */
        foreach ($image_sizes as $size) {
            $this->saveThumb($file_name, $size);
        }
    }

    /**
     * Create Image object and store in database
     * @param $new_image_name
     * @return Image object
     */
    public function makeObject($new_image_name)
    {
        $image_service = new Image();

        $image = $image_service::create(['name' => $new_image_name]);

        return $image;
    }
}
