// app/Models/User.php
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
use HasFactory;

protected $fillable = ['name','email','password'];
}