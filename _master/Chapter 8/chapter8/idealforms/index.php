<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta content="charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/jquery.idealforms.css">
  <title>Chapter 8 - IdealForms</title>
  <style>
    body { background: #ccc; font-family: helvetica; padding: 100px 0;}
    .content { margin: 0 30px; }
    .field.buttons button { margin-right: .5em; }
    #invalid { display: none; float: left; width: 290px; margin:0.5em 0 0 120px; color: #CC2A18; font-size: 130%; font-weight: bold; }
    .idealforms.adaptive #invalid { margin-left: 0 !important; }
    .idealforms.adaptive .field.buttons label { height: 0; }
  </style>
</head>
<body>

  <div class="content">
    <div class="idealsteps-container">
      <nav class="idealsteps-nav"></nav>
      <form action="" novalidate autocomplete="off" class="idealforms">
        <div class="idealsteps-wrap">

          <!-- Step 1 -->
          <section class="idealsteps-step">
            <div class="field">
              <label class="main">Username:</label>
              <input name="username" type="text" data-idealforms-ajax="ajax.php">
              <span class="error"></span>
            </div>
            <div class="field">
              <label class="main">Password:</label>
              <input name="password" type="password">
              <span class="error"></span>
            </div>
            <div class="field">
              <label class="main">E-Mail:</label>
              <input name="email" type="email">
              <span class="error"></span>
            </div>
            <div class="field buttons">
              <label class="main">&nbsp;</label>
              <button type="button" class="next">Next &raquo;</button>
            </div>
          </section>

          <!-- Step 2 -->
          <section class="idealsteps-step">
            <div class="field">
              <label class="main">Image:</label>
              <input id="file" name="file" multiple type="file" />
              <span class="error"></span>
            </div>
            <div class="field">
              <label class="main">Languages:</label>
              <p class="group">
                <label><input name="languages[]" type="checkbox" value="english">English</label>
                <label><input name="languages[]" type="checkbox" value="chinese">Chinese</label>
                <label><input name="languages[]" type="checkbox" value="spanish">Spanish</label>
              </p>
              <span class="error"></span>
            </div>
            <div class="field">
              <label class="main">Phone:</label>
              <input name="phone" type="text" placeholder="000-000-0000">
              <span class="error"></span>
            </div>
            <div class="field buttons">
              <label class="main">&nbsp;</label>
              <button type="button" class="prev">&laquo; Prev</button>
              <button type="submit" class="submit">Submit</button>
            </div>
          </section>
        </div>
        <span id="invalid"></span>
      </form>
    </div>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="js/jquery.idealforms.min.js"></script>
  <script>
    $('form.idealforms').idealforms({
      silentLoad: false,
      rules: {
        'username': 'required username ajax',
        'password': 'required pass',
        'email': 'required email',
        'picture': 'required extension:jpg:png',
        'languages[]': 'minoption:2 maxoption:3',
        'phone': 'required phone',
      },

      errors: {
        'username': {
          ajaxError: 'Username not available'
        }
      },

      onSubmit: function(invalid, e) {
        e.preventDefault();
        $('#invalid')
          .show()
          .toggleClass('valid', ! invalid)
          .text(invalid ? (invalid +' invalid fields') : 'All good!');
      },

      steps: {
        fadeSpeed: 300
      }
    });

    $('form.idealforms').find('input, select, textarea').on('change keyup', function() {
      $('#invalid').hide();
    });

    $('.prev').click(function(){
      $('.prev').show();
      $('form.idealforms').idealforms('prevStep');
    });
    $('.next').click(function(){
      $('.next').show();
      $('form.idealforms').idealforms('nextStep');
    });

  </script>
</body>
</html>
