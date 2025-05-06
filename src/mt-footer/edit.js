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
import { Button, PanelBody, TextControl } from "@wordpress/components";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import "./editor.scss";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const { logoUrl, menuSecondTitle, menuThirdTitle } = attributes;

	const onSelectImage = (media) => {
		setAttributes({ logoUrl: media.url });
	};

	const removeImage = () => {
		setAttributes({ logoUrl: "" });
	};

	return (
		<div {...useBlockProps()}>
			<p>{__("Mt Footer", "mt-theme")}</p>

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

				<PanelBody title={__("Footer Menu Settings", "mt-theme")}>
					<TextControl
						label={__("Footer Menu Second Title", "mt-theme")}
						value={menuSecondTitle}
						onChange={(value) => setAttributes({ menuSecondTitle: value })}
					/>
					<TextControl
						label={__("Footer Menu Third Title", "mt-theme")}
						value={menuThirdTitle}
						onChange={(value) => setAttributes({ menuThirdTitle: value })}
					/>
				</PanelBody>
			</InspectorControls>
		</div>
	);
}
