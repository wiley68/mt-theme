/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

/* eslint-disable no-console */
console.log("Mt Header");
/* eslint-enable no-console */

document.addEventListener("DOMContentLoaded", () => {
	const body = document.body;
	const toggleBtn = document.querySelector("#mt-theme-toggle");
	const toggleBtnCircle = document.querySelector("#mt-theme-toggle-circle");
	const toggleBtnDark = document.querySelector("#mt-theme-toggle-dark");
	const toggleBtnLight = document.querySelector("#mt-theme-toggle-light");

	// Check for reserved mode
	const savedMode = localStorage.getItem("mt-theme-mode");
	if (savedMode === "dark" || savedMode === "light") {
		body.classList.remove("body--light", "body--dark");
		body.classList.add(`body--${savedMode}`);
		toggleBtnCircle.classList.remove("translate-x-0", "translate-x-5");
		toggleBtnDark.classList.remove(
			"opacity-0",
			"duration-100",
			"ease-out",
			"opacity-100",
			"duration-200",
			"ease-in",
		);
		toggleBtnLight.classList.remove(
			"opacity-100",
			"duration-200",
			"ease-in",
			"opacity-0",
			"duration-100",
			"ease-out",
		);
		if (savedMode === "dark") {
			toggleBtnCircle.classList.add("translate-x-5");
			toggleBtnDark.classList.add("opacity-0", "duration-100", "ease-out");
			toggleBtnLight.classList.add("opacity-100", "duration-200", "ease-in");
		} else {
			toggleBtnCircle.classList.add("translate-x-0");
			toggleBtnDark.classList.add("opacity-100", "duration-200", "ease-in");
			toggleBtnLight.classList.add("opacity-0", "duration-100", "ease-out");
		}
	}

	// Toggle on click
	if (toggleBtn) {
		toggleBtn.addEventListener("click", () => {
			const isDark = body.classList.contains("body--dark");
			const newMode = isDark ? "light" : "dark";

			body.classList.remove("body--light", "body--dark");
			body.classList.add(`body--${newMode}`);
			toggleBtnCircle.classList.remove("translate-x-0", "translate-x-5");
			toggleBtnDark.classList.remove(
				"opacity-0",
				"duration-100",
				"ease-out",
				"opacity-100",
				"duration-200",
				"ease-in",
			);
			toggleBtnLight.classList.remove(
				"opacity-100",
				"duration-200",
				"ease-in",
				"opacity-0",
				"duration-100",
				"ease-out",
			);
			if (newMode === "dark") {
				toggleBtnCircle.classList.add("translate-x-5");
				toggleBtnDark.classList.add("opacity-0", "duration-100", "ease-out");
				toggleBtnLight.classList.add("opacity-100", "duration-200", "ease-in");
			} else {
				toggleBtnCircle.classList.add("translate-x-0");
				toggleBtnDark.classList.add("opacity-100", "duration-200", "ease-in");
				toggleBtnLight.classList.add("opacity-0", "duration-100", "ease-out");
			}

			localStorage.setItem("mt-theme-mode", newMode);
		});
	}
});
