<div id="content-top">
    <h2><?=($updType == 'create') ? "Crear Producto" : "Editar producto"?></h2>
    <a href='/products/' class='bforward'><?=lang('web_back_to_list')?></a>
    <span class="clearFix">&nbsp;</span>
</div>


<?php 
$attributes = array('class' => 'tform', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('products/create', $attributes) : form_open_multipart('products/edit', $attributes); 
?>

<p>
	<label class='labelform' for="name"><?=lang('web_name')?> <span class="required">*</span></label>
	<input id="name" type="text" name="name" maxlength="256" value="<?php echo set_value('name', (isset($product->name)) ? $product->name : ''); ?>"  />
	<?php echo form_error('name'); ?>
</p>

<p>
	<label class='labelform' for="description"><?=lang('web_description')?> <span class="required">*</span></label>
	<textarea id="description"  name="description"  /><?php echo set_value('description', (isset($product->description)) ? $product->description : ''); ?></textarea>
	<?php echo form_error('description'); ?>
</p>

<p>
	<label class='labelform' for='category_id'><?=lang('web_category')?> <span class="required">*</span></label>

	<select name='category_id' id='category_id'>
		<option value='-'><?=lang('web_choose_option')?></option>
		<?php foreach ($categories as $category): ?>
			<option value='<?=$category->id?>' <?= preset_select('category_id', $category->id, (isset($product->category_id)) ? $product->category_id : ''  ) ?>><?=$category->name?></option>
		<?php endforeach ?>
	</select>
	<?php echo form_error('category_id'); ?>
</p>

<p>
	<label class='labelform' for="image"><?=lang( ($updType == 'edit')  ? "web_image_edit" : "web_image_create" )?> <span class="required">*</span></label>

	<?php if ($updType == 'edit'): ?>
		<p> <img src='/public/uploads/img/thumbs/<?=$product->image?>' /> </p>
	<?php endif ?>

	<input id="image" type="file" name="image" />
	<br/><?php echo form_error('image'); ?>
	<?php  echo ( isset($upload_error)) ?  $upload_error  : ""; ?>
</p>

<p>
	<label class='labelform'><?=lang('web_active')?></label>
	<input id="active" type="checkbox" name="active" value='1' <?=preset_checkbox('active', '1', (isset($product->active)) ? $product->active : ''  )?> /><label class='labelforminline' for='active'> ¿Está activo en la web? </label>
	<?php echo form_error('active'); ?>
</p>

<p>
	<label class='labelform'><?=lang('web_choose_option')?> <span class="required">*</span></label>

	<?= form_radio('option', '1', TRUE, preset_radio('option', '1', (isset($product->option)) ? $product->option : ''  )); ?><label class='labelforminline' for='option1'> Opción 1 </label>
	<?=form_radio('option', '2', FALSE, preset_radio('option', '2', (isset($product->option)) ? $product->option : ''  )); ?><label class='labelforminline' for='option1'> Opción 2 </label>
	<?=form_radio('option', '3', FALSE, preset_radio('option', '3', (isset($product->option)) ? $product->option : ''  )); ?><label class='labelforminline' for='option1'> Opción 3 </label>

	<?php echo form_error('option'); ?>
</p>

<p>
    <?php echo form_submit( 'submit', ($updType == 'edit') ? lang('web_edit_product') : lang('web_add_product') ); ?>
</p>


<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$product->id) ?>
<?php endif ?>

<?php echo form_close(); ?>