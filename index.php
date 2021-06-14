<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./css/styles.css">
  
  <?php include('./php/form.php') ?>
  
  <title>PrBr</title>
</head>
<body>
  <!-- Main logo -->
  <div class="main-logo">
    <img alt="Fit Fiu logo" src="./img/logo.png">
    <div class="main-logo__lema">fit your needs</div>
  </div>
  <!-- Main form -->
  <?php if (!isset($_POST["submit"]) || $_SERVER['REQUEST_METHOD'] != 'POST'): ?>
    <div class="container main-form">
      <form 
        action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" 
        enctype="multipart/form-data"
        id="landing-form" 
        method="post" 
      >
        <h3 class="main-form__title">Selecciona los valores para tu landing page</h3>
        <div class="group group--form">
          <label class="text--bold" for="product-name">Nombre del producto</label>
          <input 
            id="product-name" 
            name="product-name" 
            required 
            type="text" 
            value="<?php echo $product_name ?>"
          />
        </div>
        <hr>
        <div class="group group--form">
          <label class="text--bold" for="product-img">Imagen del producto</label>
          <input accept="image/*" id="product-img" name="product-img" required type="file" />
        </div>
        <hr>
        <div class="group group--form">
          <div class="row">
            <label class="text--bold">Atributos</label>
          </div>
          <select
            id="product-attr"
            multiple
            name="product-attr[]"
            required 
            size="6"
            value="<?php echo $product_attr ?>"
          >
            <option value="product-attr-speed">Velocidad máxima</option>
            <option value="product-attr-power">Potencia</option>
            <option value="product-attr-size">Superficie de carrera</option>
            <option value="product-attr-fold">Plegado hidráulico</option>
            <option value="product-attr-train">Entrenamiento</option>
            <option value="product-attr-xtra">Extras</option>
          </select>
          <small>(Ctrl+clic para seleccionar más de uno)</small>
        </div>
        <hr>
        <div class="group group--form">
          <label class="text--bold" for="product-desc">Descripción del producto</label>
          <textarea
            cols="30"
            id="product-desc"
            name="product-desc"
            required
            rows="10"
            value="<?php echo $product_desc ?>"
          ></textarea>
        </div>
        <hr>
        <?php
          if (isset($_SESSION['form_errors'])) {
            foreach($_SESSION['form_errors'] as $error) {
              echo '<div class="error-message text--bold">' . $error . '</div>';
            }
          }
        ?>
        <div class="group">
          <button name="submit" type="submit">
            <div class="btn-text">
              Confirmar
            </div>
          </button>
        </div>
      </form>
    </div>
  <?php else: ?>
  <!-- Main content -->
    <div class="container">
      <!-- Main header -->
      <div class="main-header" id="main-header">
        <div class="content">
          <div class="main-header__presentation">
            <div class="main-header__presentation__title">
              <div>
                <?php echo $product_name ?>  
              </div>
            </div>
            <div class="main-header__presentation__attrs">
              <ul>
              <?php foreach($product_attr as $key=>$value): ?>
                <li>
                  <div class="main-header__presentation__attrs__title">
                  <?php echo $product_attr_trans[$value]->title ?>
                  </div>
                  <div class="main-header__presentation__attrs__subtitle">
                  <?php echo $product_attr_trans[$value]->subtitle ?>
                  </div>
                </li>
              <?php endforeach; ?>
              </ul>
            </div>
            <div class="main-header__presentation__warranty">
              <img alt="Garantia 2 años" src="./img/garantia.png">
            </div>
          </div>
          <div class="main-header__right">
            <div class="main-header__right__img">
              <img src="<?php echo 'img/usr_img/' . basename($product_img['name']) ?>" alt="Imagen del producto">
            </div>
          </div>
        </div>
      </div>
      <!-- Folding banner -->
      <div class="container__content content folding-banner" id="folding-banner">
        <img alt="" class="folding-banner__img growable" src="./img/cinta-plegada.jpg">
        <div class="folding-banner__right growable">
          <img alt="" src="./img/icono.JPG">
          <div class="banner-title">Plegado compacto</div>
          <div class="banner-text">Ahorra espacio con su sistema de plegado vertical y compacto</div>
        </div>
      </div>
      <!-- Grid gallery -->
      <div class="container__content content img-grid" id="img-grid">
        <div class="growable img-grid__item" >
          <img 
            alt="Grid image 1" 
            class="img-grid__item__img" 
            src="./img/01.jpg" 
            onmouseenter="focusImg(this)"
            onmouseleave="unfocusImg(this)"
          >
          <div class="img-grid__item__caption">Alcanza hasta 14km/h gracias a su potente motor de 1500W</div>
        </div>
        <div class="growable img-grid__item">
          <img 
            alt="Grid image 2" 
            class="img-grid__item__img" 
            src="./img/02.jpg" 
            onmouseenter="focusImg(this)"
            onmouseleave="unfocusImg(this)"
          >
          <div class="img-grid__item__caption">Pantalla LCD con 12 programas y lectura en tiempo real</div>
        </div>
        <div class="growable img-grid__item">
          <img 
            alt="Grid image 3" 
            class="img-grid__item__img" 
            src="./img/03.jpg" 
            onmouseenter="focusImg(this)"
            onmouseleave="unfocusImg(this)"
          >
          <div class="img-grid__item__caption">Entrena cómodamente en una superficie de carrera de 110x40cm</div>
        </div>
        <div class="growable img-grid__item">
          <img 
            alt="Grid image 4" 
            class="img-grid__item__img" 
            src="./img/04.jpg" 
            onmouseenter="focusImg(this)"
            onmouseleave="unfocusImg(this)"
          >
          <div class="img-grid__item__caption">Incorpora sensor de frecuencia cardíaca en el manillar</div>
        </div>
        <div class="growable img-grid__item">
          <img 
            alt="Grid image 5" 
            class="img-grid__item__img" 
            src="./img/05.jpg" 
            onmouseenter="focusImg(this)"
            onmouseleave="unfocusImg(this)"
          >
          <div class="img-grid__item__caption">Dispone de 2 ruedas frontales para facilitar su transporte</div>
        </div>
        <div class="growable img-grid__item">
          <img 
            alt="Grid image 6" 
            class="img-grid__item__img" 
            src="./img/06.jpg" 
            onmouseenter="focusImg(this)"
            onmouseleave="unfocusImg(this)"
          >
          <div class="img-grid__item__caption">Conexión mp3 para que disfrutes de tu entrenamiento</div>
        </div>
      </div>
      <!-- Product description -->
      <div class="container__content content growable product-desc" id="product-desc">
        <h3 class="regular-title"><span class="title-dash">-</span>Descripción del producto</h3>
        <div class="product-desc__text">
          <p>
            <?php echo $product_desc ?>
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel magna porttitor, faucibus velit vel, faucibus sapien. Suspendisse lacus augue, interdum ut purus sed, consectetur feugiat felis. Nulla pharetra odio a porttitor maximus. Donec commodo ligula non neque porttitor, vel dignissim justo interdum. Praesent consectetur neque eget tortor vehicula, rutrum interdum ipsum eleifend. Nulla aliquet lectus et nunc volutpat finibus. Phasellus dapibus non nisi quis sollicitudin. Nunc ut dapibus risus. Pellentesque egestas nibh in nulla tincidunt, at lobortis neque dictum. Nullam efficitur sapien sed libero scelerisque, quis pharetra nibh vulputate. Morbi quis luctus lorem, id ullamcorper dolor. Aliquam sagittis at dolor nec scelerisque. Duis ac porttitor nibh.
          </p>
          <p>
            Praesent quis dignissim turpis. Sed sapien magna, condimentum at libero id, efficitur molestie diam. Curabitur nec arcu nisl. Vestibulum vel metus in orci sagittis dictum quis et sapien. Nulla facilisi. Etiam venenatis in orci sit amet luctus. Sed vel dui dictum, tempus purus eget, posuere mauris.
          </p>
          <p>
            Aenean mattis nulla quis velit finibus, tincidunt dictum purus interdum. Sed posuere nisi sit amet risus interdum, id iaculis lorem tempor. Nam vehicula at dolor vitae elementum. Cras lacus erat, gravida non leo ut, varius viverra turpis. Cras sem nulla, molestie et accumsan in, commodo vel elit. Phasellus id viverra odio, sed fermentum sem. Ut risus nulla, auctor quis suscipit sit amet, bibendum sit amet risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed pellentesque elit velit. Vestibulum ut felis mauris. Vivamus varius commodo augue, eget sollicitudin neque tincidunt pellentesque. Nullam maximus rutrum sagittis. Nunc ac eleifend eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed tristique nulla augue, in blandit elit tempor nec. Nulla venenatis sodales elit quis eleifend.
          </p>
          <p>
            Curabitur a sem et velit mattis luctus ut quis nisl. Ut sollicitudin rhoncus sapien, id mollis eros. Nam gravida ex cursus, lobortis nisl placerat, commodo purus. Ut a diam et enim feugiat vulputate non eu mauris. Nam gravida mauris non purus hendrerit, nec egestas purus mollis. Vivamus mollis risus id pretium mattis. Nulla tempor ipsum libero, et dictum est tincidunt a. Aenean molestie ipsum eu sapien lacinia vestibulum. Aliquam placerat mollis lorem, sed vulputate risus condimentum eget. Etiam consequat augue id justo finibus, non hendrerit lacus malesuada. Mauris varius, nisl vitae fermentum vestibulum, arcu ligula laoreet lacus, at finibus est odio et purus. Morbi semper pretium ipsum nec viverra. Quisque nisi dui, luctus a lacus eget, semper venenatis quam.
          </p>
          <p>
            Praesent efficitur ligula vitae posuere cursus. In hac habitasse platea dictumst. Aenean pretium sit amet felis euismod consectetur. Proin pulvinar vitae lorem quis tempor. Nunc eget porta ligula. Nullam ac augue maximus, posuere massa eget, malesuada leo. Ut semper condimentum lorem, ac sagittis orci bibendum eu. Maecenas pulvinar mattis quam, eget tempor enim cursus ut. In eget nibh quis purus consectetur molestie pharetra at lacus. Mauris quis fermentum risus. Aliquam erat volutpat. Quisque laoreet risus ut ornare sollicitudin.
          </p>
        </div>
      </div>
      <!-- Specs accordions -->
      <div class="container__content content growable product-specs" id="product-specs">
        <h3 class="regular-title"><span class="title-dash">-</span>Ficha técnica</h3>
        <?php
          foreach($specs as $title=>$specs): {
        ?>
        <div class="product-specs__specs__group">
          <h3 
            class="product-specs__specs__group__title"
            onmousedown="collapsing(this)"
          >
            <?php echo $title ?>
          </h3>
          <div class="product-specs__specs__group__collapse">
            <ul class="product-specs__specs__group__specs">
              <?php
                foreach($specs as $spec=>$value) {
                  echo 
                  '<li class="growable product-specs__specs__group__spec">' .
                    '<span class="product-specs__specs__group__spec__title">' .
                      $spec .
                    '</span>' .
                    '<span class="product-specs__specs__group__spec__value">' .
                      $value .
                    '</span>' .
                  '</li>';
                }
              ?>
            </ul>
          </div>
        </div>
        <?php } endforeach; ?>
        <div class="product-specs__specs__group">
          <h3 
            class="product-specs__specs__group__title"
            onmousedown="collapsing(this)"
          >
            Dimensiones y peso del producto
          </h3>
          <div class="product-specs__specs__group__collapse">
            <ul class="product-specs__specs__group__specs">
              <?php
                foreach($size_specs as $spec=>$value) {
                  echo 
                  '<li class="product-specs__specs__group__spec">' .
                    '<span class="product-specs__specs__group__spec__title">' .
                      $spec .
                    '</span>' .
                    '<span class="product-specs__specs__group__spec__value">' .
                      $value .
                    '</span>' .
                  '</li>';
                }
              ?>
              <img alt="Medidas del producto" src="./img/tecnic.JPG">
            </ul>
          </div>
        </div>
      </div>
      <!-- Base img banner -->
      <div class="container__content content growable img-banner" id="img-banner"></div>
      <!-- Titles banner -->
      <div class="container__content content titles-banner" id="titles-banner">
        <div class="growable titles-banner__item">
          <div class="banner-title">Comodidad</div>
          <div class="banner-text">Entrenamiento cómodo y dinámico sin salir de casa</div>
        </div>
        <div class="growable titles-banner__item">
          <div class="banner-title">Resistencia</div>
          <div class="banner-text">Ideal para iniciarse en el cardio y mejorar la resistencia</div>
        </div>
        <div class="growable titles-banner__item">
          <div class="banner-title">Fuerza</div>
          <div class="banner-text">Trabaja el tren inferior de tu cuerpo</div>
        </div>
      </div>
      <!-- Motivate banner -->
      <div class="container__content content growable motivate-banner" id="motivate-banner"></div>
      <!-- Final logo banner -->
      <div class="container__content content growable logo-banner" id="logo-banner">
        <img alt="Fit fiu logo" id="footer-logo-img" src="./img/logo.JPG">
      </div>
    </div>
  <?php endif; ?>
  <script>
    <?php require_once("./js/main.js");?>
  </script>
</body>
</html>