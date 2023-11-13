<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

class OBSERVERStorageFile
{

    //======================== CALLBACKS =============================

    /*
    app\Providers\EventServiceProvider.php :
    {Model}::observe(OBSERVERStorageFile::class);

    ###### IMPORTANTE: correr en terminal #####
    php artisan storage:link

    */
    public function creating(Model $E_entity): void
    {
        $this->_upload($E_entity);
    }

    public function updating(Model $E_entity): void
    {
        $this->_upload($E_entity);
    }

    public function deleted(Model $E_entity): void
    {
        foreach ($E_entity->file_paths as $PATH_file) {
            Storage::disk('public')->delete($PATH_file);
        }
    }

    public function retrieved(Model $E_entity): void
    {
        $E_entity->file_paths = [];
        //esta en un foreach porque pueden ser varios fields por modelo
        foreach ($this->__getConfiguration($E_entity) as $A_configuration) {
            $FIELD_FILE_NAME = $A_configuration['fields']['file_name'];
            $FILES_FIELD = $A_configuration['files_field']; //asi se llamara el array donde vendran los archivos de imagenes
            $S_file_value = $E_entity[$FIELD_FILE_NAME];
            $E_entity[$FILES_FIELD] = null;

            $PATH_file = $E_entity::$FILE_UPLOAD_PATH . $S_file_value;

            if ($S_file_value && Storage::disk('public')->exists($PATH_file)) {
                $E_entity[$FILES_FIELD] = Storage::disk('public')->url($PATH_file);
                $E_entity->file_paths = array_merge($E_entity->file_paths, [$PATH_file]);
            }
        }
    }

    //======================== FILE SYSTEM ==========================
    private function _upload(Model $E_entity)
    {
        //esta en un foreach porque pueden ser varios fields por modelo
        foreach ($this->__getConfiguration($E_entity) as $A_configuration) {

            $FIELD_FILE_DATA = $A_configuration['fields']['file'];
            $FIELD_FILE_NAME = $A_configuration['fields']['file_name'];
            $FILES_FIELD = $A_configuration['files_field']; //asi se llamara el array donde vendran los archivos de imagenes

            unset($E_entity[$FILES_FIELD]); //hay que dessetearlo porque da errores

            //checar si se va a guardar la data
            if (isset($E_entity[$FIELD_FILE_DATA]) && $E_entity[$FIELD_FILE_DATA]) {

                $FILE_file =  $E_entity[$FIELD_FILE_DATA]; //uploades fle
                $A_file_info = $FILE_file->getClientOriginalName();
                $S_filename = $A_configuration['file_prefix'] . $E_entity->id . Str::random(8) . '.' . pathinfo($A_file_info, PATHINFO_EXTENSION); //se crea un nombre para el archivo
                $E_entity[$FIELD_FILE_NAME] = $S_filename;
                $this->__uploadToServer($E_entity::$FILE_UPLOAD_PATH . $S_filename, $FILE_file->getPathName());
            }
            //unset para evitar tratar de guardarlo en BD
            unset($E_entity[$FIELD_FILE_DATA]);
            unset($E_entity['file_paths']);
        }
    }

    private function __uploadToServer($PATH_upload_file, $PATH_server_file, $B_ignore_if_exists = false)
    {
        $B_exist = Storage::disk('public')->exists($PATH_upload_file);

        if ($B_ignore_if_exists && $B_exist) {
            return $PATH_server_file;
        }

        try {
            Storage::disk('public')->put($PATH_upload_file, file_get_contents($PATH_server_file));
        } catch (Exception $e) {
            throw new Exception("OBSERVERUploadFile | __uploadToServer() -> " . $e->getMessage());
        }
    }

    private function __getConfiguration(Model $E_entity)
    {
        return $E_entity::$OBSERVER_UPLOAD_FILE;
    }
}
