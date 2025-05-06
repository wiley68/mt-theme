<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<?php
$logo_url = $attributes['logoUrl'] ?? '';
?>
<div class="flex flex-col items-center justify-center bg-zinc-700 text-gray-200">
	<a href="/#top" class="flex items-center justify-center w-full h-10 bg-zinc-600 hover:bg-zinc-500 select-none cursor-pointer drop-shadow-md drop-shadow-zinc-800">
		<?php esc_html_e('Back to Top', 'mt-theme'); ?>
	</a>
	<div class="flex flex-col items-center w-full max-w-6xl p-4">
		<div class="flex justify-center w-full flex-1">
			<div class="flex-1/5 flex flex-col text-sm text-zinc-400">
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="flex items-center">
					<?php if (!empty($logo_url)) { ?>
						<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="size-10">
					<?php } else { ?>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-10 text-amber-400" fill="currentColor" aria-hidden="true" data-slot="icon">
							<path d="M12.89,3L14.85,3.4L11.11,21L9.15,20.6L12.89,3M19.59,12L16,8.41V5.58L22.42,12L16,18.41V15.58L19.59,12M1.58,12L8,5.58V8.41L4.41,12L8,15.58V18.41L1.58,12Z" />
						</svg>
					<?php } ?>
				</a>
				<p><?php echo esc_html(get_bloginfo('description')); ?></p>
			</div>
			<div class="flex-2/5 flex">
				<div class="flex flex-col flex-1/2">
					<div>menu footer 1</div>
					<div></div>
				</div>
				<div class="flex flex-col flex-1/2">
					<div>menu footer 2</div>
					<div></div>
				</div>
			</div>
			<div class="flex-2/5">3 kolona w dqsno</div>
		</div>
		<div>
			copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
		</div>
	</div>
</div>