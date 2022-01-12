<?php

namespace App\Http\Controllers;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{

    public static function requestTwitter()
    {
        $hashtagAjax = isset($_GET['hashtagAjax']) ? $_GET['hashtagAjax'] : null;
        $postsAjax = isset($_GET['postsAjax']) ? $_GET['postsAjax'] : null;

        $consumer_key = 'insert-consumer-key-here';
        $consumser_secret = 'insert-consumer-secret-here';
        $access_token = 'insert-acess-token-here';
        $access_token_secret = 'insert-acess-secret-here';

//Include TwitterOAuth
/**
 * @param string $class The fully-qualified class name.
 * @return void
 */
        spl_autoload_register(function ($class) {
            // project-specific namespace prefix
            $prefix = 'Abraham\\TwitterOAuth\\';

            // base directory for the namespace prefix
            $base_dir = __DIR__ . '/src/';

            // does the class use the namespace prefix?
            $len = strlen($prefix);
            if (strncmp($prefix, $class, $len) !== 0) {
                // no, move to the next registered autoloader
                return;
            }

            // get the relative class name
            $relative_class = substr($class, $len);

            // replace the namespace prefix with the base directory, replace namespace
            // separators with directory separators in the relative class name, append
            // with .php
            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

            // if the file exists, require it
            if (file_exists($file)) {
                require $file;
            }
        });

//----------------use Api -------------------------

//Connect API
        $connection = new TwitterOAuth($consumer_key, $consumser_secret, $access_token, $access_token_secret);
        $connection->setTimeouts(20, 15);
        $content = $connection->get('account/verify_credentials');
        $statuses = $connection->get("search/tweets", ["q" => $hashtagAjax]);

//---------------Return for Display----------------------
        ?>
<div class="row justify-content-center">
    <?php
$countPosts = 0;
        foreach ($statuses as $value) {
            foreach ($value as $field) {
                if (++$countPosts > $postsAjax) {
                    break;
                }
                ?>
<div class="col-3"></div>
<div class="col-6 mt-4">
  <div class="card">
    <div class="card-body">
    <img class="rounded-circle" src="<?php echo ($field->user->profile_image_url); ?>" alt="profile Picture">
    <h5 class="card-title"><?php echo ($field->user->name); ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo ($field->created_at); ?> </h6>
      <?php echo ($field->text); ?>

    </div>
  </div>
</div>
<div class="col-3"></div>

<?php
}
        }
        ?>
        </div>
        <?php

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */

    public static function destroyUser()
    {
        $IdInUri = explode("/", $_SERVER['REQUEST_URI']);
        $id = $IdInUri[2];
        DB::table('users')->delete($id);
    }

    public static function updateUser()
    {

        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $name = isset($_GET['name']) ? $_GET['name'] : null;
        $email = isset($_GET['email']) ? $_GET['email'] : null;
        $password = isset($_GET['password']) ? $_GET['password'] : null;

        $passwordHash = Hash::make($password);

        DB::table('users')
            ->where('Id', $id)
            ->update([
                'Name' => $name,

                'Email' => $email,

                'password' => $passwordHash,

            ]);

        echo ("<div class='alert alert-success mt-3' role='alert'>success</div>");
    }

}
