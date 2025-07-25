<?php

    namespace App\Traits;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;

    trait FileUploadTrait
    {
        /**
         * Upload a file from the request.
         *
         * @param Request $request
         * @param string $fieldName - name of the input file field
         * @param string $directory - directory to save the file in (default: 'uploads')
         * @param string|null $disk - storage disk (default: 'public')
         * @return string - the path of the saved file
         */
        public function upload(
            Request $request,
            string $fieldName,
            string $directory = 'uploads',
            string $disk = 'public'
        ): ?string {
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                return $file->storeAs($directory, $filename, $disk);
            }

            return null;
        }

        /**
         * Delete a file from storage.
         *
         * @param string $filePath - path of the file to delete (relative to the disk)
         * @param string $disk - storage disk (default: 'public')
         * @return bool
         */
        public function delete(string $filePath, string $disk = 'public'): bool
        {
            return Storage::disk($disk)->exists($filePath)
                ? Storage::disk($disk)->delete($filePath)
                : false;
        }
    }
