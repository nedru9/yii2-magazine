<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

trait UploadImageTrait
{
    /**
     * Сохранение изображения
     *
     * @return bool
     */
    /**
     * Сохранение изображения
     *
     * @return bool
     */
    public function uploadImage(): bool
    {
        /** @var UploadedFile|null $this ->imageFile */
        if (empty($this->imageFile)) {
            return false;
        }

        $dirName = static::DIR_IMAGE;
        $uploadPath = Yii::getAlias('@img') . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR;

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $fileName = uniqid() . '.' . $this->imageFile->extension;
        $filePath = $uploadPath . $fileName;

        if ($this->imageFile->saveAs($filePath)) {
            if (!empty($this->image)) {
                $oldFilePath = Yii::getAlias('@img') . $this->image;

                if (file_exists($oldFilePath)) {
                    @unlink($oldFilePath);
                }
            }

            $this->image = "/img/$dirName/$fileName";

            return true;
        }

        return false;
    }
}
