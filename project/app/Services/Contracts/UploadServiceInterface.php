<?php

namespace App\Services\Contracts;

Interface UploadServiceInterface
{
    public function uploadViaDevice();
    public function uploadViaApi();
}
