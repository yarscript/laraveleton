<?php

namespace Yarscript\Admin\Services;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 *
 */
class MediaService
{
    /**
     * @var string
     */
    protected string $mediaCollection = 'images';

    /**
     * @param string $collection
     * @return $this
     */
    public function setMediaCollection(string $collection): self
    {
        $this->mediaCollection = $collection;

        return $this;
    }

    /**
     * @return string
     */
    public function getMediaCollection(): string
    {
        return $this->mediaCollection;
    }

    /**
     * @param HasMedia $entity
     * @param UploadedFile ...$media
     * @return \Illuminate\Support\Collection
     */
    public function attachMedia(HasMedia $entity, UploadedFile ...$media): \Illuminate\Support\Collection
    {
        return collect($media)->map(
            fn(UploadedFile $file) => $entity->addMedia($file)->toMediaCollection($this->mediaCollection)
        );
    }

    /**
     * @param HasMedia $entity
     * @param UploadedFile ...$media
     * @return \Illuminate\Support\Collection
     */
    public function updateMedia(HasMedia $entity, UploadedFile ...$media): \Illuminate\Support\Collection
    {
        $this->deleteMedia($entity);
        return $this->attachMedia($entity, ...$media);
    }

    /**
     * @param HasMedia $entity
     * @return mixed
     */
    public function deleteMedia(HasMedia $entity)
    {
        return $entity->media->map(fn(Media $media) => $media->delete());
    }
}
