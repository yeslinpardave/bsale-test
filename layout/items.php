<div class="product__conteiner ">
    <input type="hidden" id="id" value="<?php echo $item['id']; ?>">
    <div class="product__img"><img src="<?php echo $item['url_image']; ?>"/></div>
    <div class="title__name"> <?php echo $item['name']; ?></div>
    <div class="title__price"><span>S/ <?php echo $item['price']; ?></span></div>
    <div class="title__discount"><span>Descuento:  S/<?php echo $item['discount']; ?>.00</span></div>
    
   <div class="button">
        <button class="button btn-add">COMPRAR</button>
    </div>
    
</div>
