<!-- Tiny class to store all the product attributes and render it on the front end conditionally based on the user's selection -->
<?php
  class ProductAttr {
    public $title;
    public $subtitle;

    public function __construct($title, $subtitle)
    {
      $this->title = $title;
      $this->subtitle = $subtitle;
    }
  }

  $product_attr_trans['product-attr-speed'] = new ProductAttr('Velocidad máxima', '14km/h');
  $product_attr_trans['product-attr-power'] = new ProductAttr('Potencia', '1500W');
  $product_attr_trans['product-attr-size'] = new ProductAttr('Superficie de carrera', '110x40cm');
  $product_attr_trans['product-attr-fold'] = new ProductAttr('Plegado hidráulico', 'Ultracompacto');
  $product_attr_trans['product-attr-train'] = new ProductAttr('Entrenamiento', '12 Programas específicos');
  $product_attr_trans['product-attr-xtra'] = new ProductAttr('Extras', 'Conexión MP3');
?>