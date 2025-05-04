/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import {
	useBlockProps,
	MediaUpload,
	MediaUploadCheck,
	InspectorControls,
} from "@wordpress/block-editor";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import "./editor.scss";

import { useSelect } from "@wordpress/data";
import { Button, PanelBody, SelectControl } from "@wordpress/components";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const { logoUrl, profilePage, contactPage } = attributes;

	const onSelectImage = (media) => {
		setAttributes({ logoUrl: media.url });
	};

	const removeImage = () => {
		setAttributes({ logoUrl: "" });
	};

	const pages = useSelect((select) => {
		const allPages = select("core").getEntityRecords("postType", "page", {
			per_page: -1,
		});
		if (!allPages) return [];
		return allPages.map((page) => ({
			label: page.title.rendered || `(${page.slug})`,
			value: page.id,
		}));
	}, []);

	return (
		<div {...useBlockProps()}>
			<p>{__("Mt Header", "mt-theme")}</p>

			<InspectorControls>
				<PanelBody title={__("Logo Settings", "mt-theme")}>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={onSelectImage}
							allowedTypes={["image"]}
							value={logoUrl}
							render={({ open }) => (
								<Button onClick={open} isSecondary>
									{logoUrl
										? __("Change logo", "mt-theme")
										: __("Select logo", "mt-theme")}
								</Button>
							)}
						/>
					</MediaUploadCheck>

					{logoUrl && (
						<div style={{ marginTop: "10px" }}>
							<img
								src={logoUrl}
								alt={__("Selected logo", "mt-theme")}
								style={{ maxWidth: "100px" }}
							/>
							<Button
								onClick={removeImage}
								isLink
								isDestructive
								style={{ display: "block", marginTop: "5px" }}
							>
								{__("Remove logo", "mt-theme")}
							</Button>
						</div>
					)}
				</PanelBody>

				<PanelBody title={__("User Menu Settings", "mt-theme")}>
					{pages.length > 0 ? (
						<>
							<SelectControl
								label={__("Profile page", "mt-theme")}
								value={profilePage}
								options={[
									{ label: __("Select a page", "mt-theme"), value: 0 },
									...pages,
								]}
								onChange={(value) =>
									setAttributes({ profilePage: parseInt(value, 10) })
								}
								__next40pxDefaultSize={true}
								__nextHasNoMarginBottom={true}
							/>
							<SelectControl
								label={__("Contact page", "mt-theme")}
								value={contactPage}
								options={[
									{ label: __("Select a page", "mt-theme"), value: 0 },
									...pages,
								]}
								onChange={(value) =>
									setAttributes({ contactPage: parseInt(value, 10) })
								}
								__next40pxDefaultSize={true}
								__nextHasNoMarginBottom={true}
							/>
						</>
					) : (
						<p>{__("Loading pages…", "mt-theme")}</p>
					)}
				</PanelBody>
			</InspectorControls>
		</div>
	);
}
