<?php

namespace infrastructure;

use App\Models\Image;
use Illuminate\Support\Facades\Config;
use infrastructure\Facades\FileFacade;
use Intervention\Image\ImageManager;

/**
 * Image Cropper
 * php version 8
 *
 * @category ImageCropper
 * @package  Zend_Service_DeveloperGarden
 * @author   Spera Labs <contact@cyberelysium.com>
 * @license  cyberelysium.com/ Config
 * @link     cyberelysium.com/
 * */

class ImageCropper
{
    const CROP = "/crop";
    protected $upload_path;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->upload_path = Config::get('images.upload_path');
    }

    /**
     * Up
     *
     * @param mixed $image      Image
     * @param mixed $dimensions Dimension
     *
     * @return void
     */
    public function up($image, $dimensions)
    {

        if ($image) {
            //get filename with extension
            $filename_with_extension = $image->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filename_with_extension, PATHINFO_FILENAME);

            //get file extension
            $extension = $image->extension();

            //filename to store
            $filename_to_store = FileFacade::makeName($image);

            // dd(public_path($this->upload_path) . '/');
            //Upload File
            $image->move($this->upload_path . '/', $filename_to_store);

            if (!is_dir($this->upload_path . self::CROP)) {
                mkdir($this->upload_path . self::CROP, 0755);
            }
            // crop image
            $manager = new ImageManager(array('driver' => Config::get('images.driver')));

            $img = $manager->make($this->upload_path . '/' . $filename_to_store);
            $crop_path = $this->upload_path . self::CROP . '/' . $filename_to_store;

            $img->crop((int) $dimensions['w'], (int) $dimensions['h'], (int) $dimensions['x1'], (int) $dimensions['y1']);
            $img->save($crop_path);
            $output = $this->storeToDb($filename_to_store, (int) $dimensions['w'], (int) $dimensions['h'], (int) $dimensions['x1'], (int) $dimensions['y1']);
            return ['status' => 1, 'data' => $output];
        }
        return ['status' => 0, 'data' => ''];
    }

    /**
     * Store ToDb
     *
     * @param mixed $image Image
     *
     * @return void
     */
    public function storeToDb($image, $w, $h, $x1, $y1)
    {
        return Image::create(
            [
                'name' => $image,
                'w' => $w,
                'h' => $h,
                'x1' => $x1,
                'y1' => $y1,
            ]
        );
    }
}
