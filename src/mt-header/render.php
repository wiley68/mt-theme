<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div class="mt-header">
	<div class="flex flex-wrap items-center ml-2 mt-1">
		<button type="button" class="rounded-full p-1 text-white shadow-sm border border-gray-400 hover:border-gray-300 cursor-pointer">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6" fill="currentColor" aria-hidden="true" data-slot="icon">
				<path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
			</svg>
		</button>
		<?php esc_html_e('Mt Header', 'mt-theme'); ?>
		<button id="mt-theme-toggle" aria-label="Превключи режим" style="cursor: pointer;">
			🌓 Превключи режим
		</button>
	</div>
</div>