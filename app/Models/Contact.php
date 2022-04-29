<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Contact extends Model
    {
        protected $table = 'contacts';

        protected $fillable = ['name', 'phone', 'address', 'user_id'];

        public function user() {
        return $this->belongsTo(User::class);
    }
    
    public static function validate(array $data) {
        $errors = [];
        if (! $data['name']) {
            $errors['name'] = 'Name is required.';
        }
        if (strlen($data['phone']) < 10 || strlen($data['phone']) > 11) {
            $errors['phone'] = 'Invalid phone number.';
        }
        if (strlen($data['address']) > 255) {
            $errors['address'] = 'Notes must be at most 255 characters.';
        }
        return $errors;
    }
}
