<?php
/**
 *
 */
class ALGO_Auth extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('auth_model');
    $this->isUserLogged();
  }


  // Facebook Auth
  function facebookAuth(){
    require APPPATH . 'libraries/vendor/autoload.php';
    if($_SERVER['HTTP_HOST'] == "course2quiz.algobasket.com"){
       $app_id = "683627122036127";
       $app_secret = "bfefae7f5e8843ce6e5ec991884f69b7";
    }else{
      $app_id = "683627122036127";
      $app_secret = "bfefae7f5e8843ce6e5ec991884f69b7";
    }
    $fb = new Facebook\Facebook([
      'app_id' => $app_id, // Replace {app-id} with your app id
      'app_secret' => $app_secret,
      'default_graph_version' => 'v2.2',
      ]);

      $helper = $fb->getRedirectLoginHelper();

    if($this->uri->segment(2) == "facebook"){

      $permissions = ['email']; // Optional permissions
      $loginUrl = $helper->getLoginUrl(base_url().'auth/facebookCallback/', $permissions);
      return $loginUrl;
    }elseif($this->uri->segment(2) == "facebookCallback"){
      try {
       $accessToken = $helper->getAccessToken();
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
       // When Graph returns an error
       echo 'Graph returned an error: ' . $e->getMessage();
       exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
       // When validation fails or other local issues
       echo 'Facebook SDK returned an error: ' . $e->getMessage();
       exit;
      }

      if (! isset($accessToken)) {
       if ($helper->getError()) {
         header('HTTP/1.0 401 Unauthorized');
         echo "Error: " . $helper->getError() . "\n";
         echo "Error Code: " . $helper->getErrorCode() . "\n";
         echo "Error Reason: " . $helper->getErrorReason() . "\n";
         echo "Error Description: " . $helper->getErrorDescription() . "\n";
       } else {
         header('HTTP/1.0 400 Bad Request');
         echo 'Bad request';
       }
       exit;
      }
        // Logged in
        //echo '<h3>Access Token</h3>';
        //var_dump($accessToken->getValue());
        // The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        // Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        //echo '<h3>Metadata</h3>';
        //var_dump($tokenMetadata);
        // Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId($app_id); // Replace {app-id} with your app id
        // If you know the user ID this access token belongs to, you can validate it here
        //$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();
      if (! $accessToken->isLongLived()) {
       // Exchanges a short-lived access token for a long-lived one
       try {
         $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
       } catch (Facebook\Exceptions\FacebookSDKException $e) {
         echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
         exit;
       }
       //echo '<h3>Long-lived</h3>';
       //var_dump($accessToken->getValue());
      }
        $_SESSION['fb_access_token'] = (string) $accessToken;
        try {
          // Get the \Facebook\GraphNodes\GraphUser object for the current user.
          // If you provided a 'default_access_token', the '{access-token}' is optional.
          $response = $fb->get('/me?fields=id,name,email', $accessToken);
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
        $user = $response->getGraphUser();
        return [
          'oauthId' => $user['id'],
          'name'    => $user['name'],
          'email'   => $user['email']
        ];

    }
  }


  // Google Auth
  function googleAuth(){

  }

  function isUserLogged(){
    if($this->session->userdata('userId')){
       redirect('welcome');
    }
    if($this->session->userdata('adminId')){
       redirect('admin/welcome');
    }
  }

}

?>
