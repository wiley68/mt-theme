<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div class="flex flex-col justify-center bg-cyan-600 text-white p-2 shadow-lg">
	<div class="flex flex-wrap items-center m-1 space-x-3">
		<button type="button" class="rounded-full p-1 text-white shadow-sm border border-gray-400 hover:border-gray-300 cursor-pointer">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6" fill="currentColor" aria-hidden="true" data-slot="icon">
				<path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
			</svg>
		</button>
		<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="flex items-center">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-10 text-amber-400 hover:text-amber-300" fill="currentColor" aria-hidden="true" data-slot="icon">
				<path d="M12.89,3L14.85,3.4L11.11,21L9.15,20.6L12.89,3M19.59,12L16,8.41V5.58L22.42,12L16,18.41V15.58L19.59,12M1.58,12L8,5.58V8.41L4.41,12L8,15.58V18.41L1.58,12Z" />
			</svg>
		</a>
		<?php esc_html_e('Mt Header', 'mt-theme'); ?>
		<button id="mt-theme-toggle" aria-label="Превключи режим" style="cursor: pointer;">
			🌓 Превключи режим
		</button>
	</div>
</div>