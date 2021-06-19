<?php
namespace App\Services;

class ImageService
{
    public function handleStoreImage($files)
    {
        $user = (object) ['image' => ""];

        if ($files) {
            $original_filename = $files->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $destination_path = './upload/user/';
            $image = 'U-' . time() . '.' . $file_ext;

            if ($files->move($destination_path, $image)) {
                $user->image = '/upload/user/' . $image;
                return array('status' => true, 'image_name' => $user->image);
            } else {
                return array('status' => false);
            }
        } else {
            return array('status' => false);
        }
    }

    public function handleUpdateImage($files, $item_image)
    {
        if ($this->handleDeleteImage($item_image)) {
            return $this->handleStoreImage($files);
        }
    }

    public function handleDeleteImage($item_image)
    {
        if (\Illuminate\Support\Facades\File::exists('.'.$item_image)) {
            \Illuminate\Support\Facades\File::delete('.'.$item_image);
        } return true;
    }
}
