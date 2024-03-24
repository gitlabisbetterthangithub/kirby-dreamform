<?php

/**
 * @var \Kirby\Cms\Block $block
 * @var \tobimori\DreamForm\Fields\TextareaField $field
 * @var \tobimori\DreamForm\Models\FormPage $form
 * @var \tobimori\DreamForm\Models\Submission|null $submission
 * @var array|null $input
 * @var array|null $error
 */

use Kirby\Toolkit\A;

?>

<div <?= attr(A::merge($input ?? [], ['data-has-error' => !!$form->errorFor($block->key())])) ?>>
	<label for="<?= $block->id() ?>">
		<span>
			<?= $block->label()->escape() ?>
		</span>
		<?php if ($required = $block->required()->toBool()) : ?>
			<em>*</em>
		<?php endif ?></label>
	<textarea <?= attr([
		'id' => $block->id(),
		'name' => $block->key(),
		'placeholder' => $block->placeholder()->or(" "),
		'required' => $required ?? null,
	]) ?>><?= $form->valueFor($block->key())->escape() ?></textarea>
	<span <?= attr(A::merge($error ?? [], [
		'data-error' => $block->key()
	])) ?>><?= $form->errorFor($block->key()) ?></span>
</div>