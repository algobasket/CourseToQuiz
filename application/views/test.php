
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Peatio - by Algobasket</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/cover/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand"><i class="fa fa-area-chart"></i> Peatio</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" target="_blank" href="https://github.com/algobasket/PeatioCryptoExchange/tree/rebuild-peatio/doc/features.md">Features</a>
            <a class="nav-link" target="_blank" href="https://github.com/algobasket/PeatioCryptoExchange/issues">Bugs/Issues</a>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Contact</a>
            <a class="btn btn-secondary btn-xs float-right" onclick="$('#myModal2').modal('show')" href="javascript:void(0)" style="margin-left:20px">
              <i class="fa fa-coffee"></i> Buy me a coffee
            </a>
          </nav>
        </div>
      </header>
      <br>
      <main role="main" class="inner cover">
        <h1 class="cover-heading">Peatio Crypto Exchange</h1>
        <p class="lead">
         Peatio is a free and open-source crypto currency exchange implementation with the Rails framework and other cutting-edge technology.
         We are using vagrant for peatio installation.
        </p>
        <p class="lead">
          <a href="http://178.128.6.144/markets/ethbtc" target="_blank" class="btn btn-lg btn-success"><i class="fa fa-line-chart"></i> Live Peatio Exchange</a>
          <a href="https://github.com/algobasket/PeatioCryptoExchange" target="_blank" class="btn btn-lg btn-secondary"><i class="fa fa-download"></i> Download Stable</a>
        </p>
        <p class="lead">
          <a href="https://www.youtube.com/watch?v=tpieNIMSBuQ" target="_blank" class="btn btn-lg btn-secondary" target="_blank"><i class="fa fa-play" style="color:#d62f2f"></i> Watch Installation Video</a>
        </p>
      </main>
      <br>
      <div class="alert alert-success">
         Login : email - algobasket@gmail.com | password - Pass@word8
      </div>
  
      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Modified and Assembled by <a href="https://algobasket.com/">Algobasket</a>, Working for <a href="https://twitter.com/peatio">@peatio</a>.</p>
          <p>Contact us on Skype - <label class="badge badge-info">algobasket</label></p>
          <p>MADE WITH <i class="fa fa-heart" style="font-size:20px;color:#d06a7b;"></i></p>

          </div>
      </footer>
    </div>
    <!-- The Modal -->
    <?php
    if(isset($_POST['submit']))
    {
      $to = "algobasket@gmail.com";
      $subject = $_POST['name'] . " New Peatio Customer - " . $_POST['subject'];
      $txt = $_POST['message'];
      $headers = "From: " .$_POST['email']. "\r\n" .
      "CC:" . $_POST['email'];
      mail($to,$subject,$txt,$headers);
    } ?>
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color:#504d4d">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5>Contact Form</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       <form method="POST">
        <!-- Modal body -->
        <div class="modal-body">
          <p>For quick reply add me on skype - <label class="badge badge-info"><big>algobasket</big></label></p>
         <div class="form-group">
            <label class="float-left">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Your Name" required/>
         </div>
         <div class="form-group">
            <label class="float-left">Email</label>
            <input type="email" name="email" placeholder="Your Email" class="form-control" required/>
         </div>
         <div class="form-group">
            <label class="float-left">Subject</label>
            <select name="subject" class="form-control">
             <option value="erc20">ERC20 Token Installation</option>
             <option value="erc20">Peatio Installation & Configuration Setting</option>
             <option value="coin daemons">Coin Daemons Installation</option>
             <option value="fiat currency">Fiat Currency Installation</option>
             <option value="mailgun configuration">MailGun Configuration</option>
             <option value="learning peatio">Want to learn peatio exchange</option>
            </select>
         </div>
         <div class="form-group">
            <label class="float-left">Message</label>
            <textarea class="form-control" name="message" placeholder="Your Message" required></textarea>
         </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <span style="margin-right:160px">
          <a href="https://twitter.com/algobasket" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>&nbsp;&nbsp;
          <a href="https://github.com/algobasket" target="_blank"><i class="fa fa-github fa-2x"></i></a>&nbsp;&nbsp;
          <a href="https://youtube.com/c/algobasket" target="_blank"><i class="fa fa-youtube fa-2x"></i></a>&nbsp;&nbsp;
          </span>
          <input type="submit" name="submit" class="btn btn-dark" value="Send Request" class="btn btn-success"/>
          <br>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color:#504d4d">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5>Donate To Build Better Exchange</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       <form method="POST">
        <!-- Modal body -->
        <div class="modal-body">
          <p>For quick reply add me on skype - <label class="badge badge-info"><big>algobasket</big></label></p>
         <div class="form-group">
            <a href="https://paypal.me/algobasket" target="_blank"><img src="https://www.reuseshop.org.uk/wp-content/uploads/2017/08/paypal-donate-button-1.gif" width="250"/></a>
         </div>
             <br>
              - OR -
             <br> <br>
         <div class="alert alert-dark">
             <table style="font-size:14px;margin-left:30px">
               <tr>
                <td>BTC : </td>
                <td>1HQxazNpvHtJCfCDsxPSd9BFvfafDyyUYr</td>
               </tr>
               <tr>
                <td>ETH : </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0xE0adAeD68598bFD1Fa66326FDfb9e8137Bc47815</td>
               </tr>
               <tr>
                <td>BCH : </td>
                <td>qz6qn7cyvxehrl5pfmgwkf0ql3garnlc5yqr6nv0n7</td>
               </tr>
             </table>
         </div>
         </div>
        </form>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
