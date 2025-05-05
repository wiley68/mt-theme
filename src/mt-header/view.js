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

	// Theme toggle
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
	// Toggle on click The button
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

	// Account menu
	const userDropDownButton = document.querySelector("#mt-theme-user-button");
	const userDropDown = document.querySelector("#mt-theme-user");
	// Toggle on click Account menu
	if (userDropDownButton) {
		userDropDownButton.addEventListener("click", (e) => {
			e.preventDefault();
			if (userDropDown.classList.contains("hidden")) {
				userDropDown.classList.remove("hidden");
			} else {
				userDropDown.classList.add("hidden");
			}
		});
	}

	// Language menu
	const languageButton = document.querySelector("#mt-theme-language-button");
	const language = document.querySelector("#mt-theme-language");
	// Toggle on click Language menu
	if (languageButton) {
		languageButton.addEventListener("click", (e) => {
			e.preventDefault();
			if (language.classList.contains("hidden")) {
				language.classList.remove("hidden");
			} else {
				language.classList.add("hidden");
			}
		});
	}

	// Close menus on click outside
	document.addEventListener("click", (event) => {
		if (!userDropDown || !userDropDownButton || !languageButton || !language)
			return;

		if (
			!userDropDown.contains(event.target) &&
			!userDropDownButton.contains(event.target)
		) {
			userDropDown.classList.add("hidden");
		}
		if (
			!language.contains(event.target) &&
			!languageButton.contains(event.target)
		) {
			language.classList.add("hidden");
		}
	});

	const languageOptions = document.getElementsByName(
		"mt-theme-language-options",
	);

	languageOptions.forEach((el) => {
		el.addEventListener("click", (e) => {
			e.preventDefault();
			const selectedLang = el.dataset.lang;

			if (typeof mt_ajax === "undefined") {
				console.error("mt_ajax not defined.");
				return;
			}

			fetch(mt_ajax.ajax_url, {
				method: "POST",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
				},
				body: new URLSearchParams({
					action: "mt_set_language",
					lang: selectedLang,
					nonce: mt_ajax.nonce,
				}),
			})
				.then((res) => res.json())
				.then((data) => {
					if (data.success) {
						location.reload();
					} else {
						console.warn("Language switch failed:", data.data);
					}
				})
				.catch((err) => {
					console.error("AJAX error:", err);
				});
		});
	});
});
