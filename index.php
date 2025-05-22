<?php
/**
 * Phanto's Epic Emojis! - Viewer
 *
 * A simple, lightweight web interface to browse the stories and adventures of Phanto.
 *
 * @package phanto-emojis
 * @version 2.21
 * @author Julibe <https://julibe.com/>
 * @link https://github.com/Julibe/Phanto-Emojis
 * @license MIT
 *
 */

$basePath = __DIR__ . '/content';
$theme = 'neutral'; // e.g., neutral, slate, zinc
$color = 'orange';  // e.g., indigo, sky, rose

// Function to process app_text strings that need dynamic theme insertion
function get_themed_text(array $app_texts_raw, $key, $theme_color) {
    $raw_text = $app_texts_raw[$key] ?? $key;
    // Replace a placeholder like %theme% with the actual theme color
    return str_replace('%theme%', htmlspecialchars($theme_color), $raw_text);
}


// Raw app_texts with placeholders for theme
$app_texts_raw = [
	'page_title' => "Phanto’s Epic Emojis!! 👻",
	'no_document_selected_folder_list' => "Psst! Pick a treasure (folder) from the left to unveil its secrets! 🎁",
	'no_document_selected_main_area' => "Check out this awesome gallery filled with pictures from Phanto’s wild adventures! 🤠<br>
	Each one captures a fun and unique moment of his playful, never-a-dull-moment life! 🪄<br>
	Select a folder from the left to view its epic story. 📂",
	'tab_details' => "Cool Details 🔮",
	'tab_social' => "Social Buzz 🤗",
	'tab_media' => "Epic Pictures 📸",
	'tab_content' => "The Full Story 🌠",
	'section_title_slug' => "The Secret Code Name 🔗 <span class='text-%theme%-700 text-sm'>(Slug)</span>",
	'section_title_date' => "Time Travel ⏳ <span class='text-%theme%-700 text-sm'>(Date)</span>",
	'section_title_extract' => "The Juicy Deets 🤫 <span class='text-%theme%-700 text-sm'>(Description)</span>",
	'section_title_description' => "Quick Peek 👀 <span class='text-%theme%-700 text-sm'>(Extract)</span>",
	'section_title_keywords' => "Magic Words 🔑 <span class='text-%theme%-700 text-sm'>(Keywords)</span>",
	'section_title_hashtags' => "Be Trendy 💯 <span class='text-%theme%-700 text-sm'>(#Hashtags)</span>",
	'section_title_emojis' => "Expressive Emojis! 🐙 <span class='text-%theme%-700 text-sm'>(Emojis)</span>",
	'section_title_poll' => "Ask the Audience! 🎉 <span class='text-%theme%-700 text-sm'>(Poll)</span>",
	'section_title_facts' => "Did You Know?! 💭 <span class='text-%theme%-700 text-sm'>(Facts)</span>",
	'section_title_cta' => "Let's Do This! 💬 <span class='text-%theme%-700 text-sm'>(Call to Action)</span>",
	'section_title_colors' => "Rainbow Power 🌈 <span class='text-%theme%-700 text-sm'>(Colors)</span>",
	'section_title_widescreen' => "Epic View! 📸 <span class='text-%theme%-700 text-sm'>(Widescreen Image)</span>",
	'section_title_square' => "A masterpiece! 🖼️ <span class='text-%theme%-700 text-sm'>(Square Image)</span>",
	'section_title_sticker' => "Awesome Art! 🎨 <span class='text-%theme%-700 text-sm'>(Sticker Image)</span>",
	'section_title_video' => "And Action! 🎞️ <span class='text-%theme%-700 text-sm'>(Video)</span>",
	'section_title_main_content_heading' => "The Grand Reveal! 📖 <span class='text-%theme%-700 text-sm'>(Story)</span>",
	'alt_widescreen' => "Phanto's super wide masterpiece",
	'alt_square' => "Phanto's neat square shot",
	'alt_sticker' => "Phanto's cool sticker design",
	'video_unsupported_browser' => "Crikey! Your browser's a bit old-school and can't play this epic video. Time for an upgrade, maybe?",
	'copy_tooltip_default' => "Snag this!",
	'copy_tooltip_all' => "Grab 'em all!",
	'error_file_not_found_media' => "Whoopsie! Phanto can't find that media file. It must be on a secret mission!",
	'error_could_not_parse' => "Oh noes! Phanto's brain got a bit scrambled trying to read this. Check the YAML format, matey!",
	'error_index_md_not_found' => "Crikey! The main map (index.md) for this folder is missing in action!",
	'error_content_dir_not_found' => "Egad! Phanto's treasure chest (content directory) seems to have vanished!",
    'error_reading_file' => "Uh oh! Phanto had trouble peeking into this file. Maybe it's shy?",
	'no_social_info' => "Looks like Phanto's keeping this one low-key. No social buzz here... yet!",
	'no_media_info' => "Hmm, no flashy pics or vids for this one. Must be top secret, or Phanto's feeling modest!",
];

// Function to generate themed component classes
function get_themed_component_classes($theme_color, $accent_color) {
    return [
        'btn_base' => "px-3 py-1 bg-{$theme_color}-700 text-white rounded-md hover:bg-{$accent_color}-700 transition-colors duration-200",
        'btn_absolute' => "absolute right-2 top-2 p-2 bg-[rgba(0,0,0,0.2)] text-white rounded-md hover:bg-[rgba(0,0,0,0.4)] transition-colors duration-200",
        'btn_list_item_absolute' => "absolute right-2 top-1/2 -translate-y-1/2 p-1 bg-[rgba(0,0,0,0.2)] text-white rounded-md hover:bg-[rgba(0,0,0,0.4)] transition-colors duration-200 text-xs",
        'content_box' => "mb-4 bg-{$theme_color}-900 p-3 rounded-md relative",
        'section_title' => "text-2xl font-bold mb-3 text-{$accent_color}-400",
        'paragraph' => "mb-4 leading-relaxed",
        'image_base' => "rounded-md w-full h-auto object-cover",
        'sticker_image' => "rounded-md md w-auto h-auto object-contain object-center",
        'video' => "rounded-md w-full h-auto max-h-96",
        'list_item_base' => "bg-{$theme_color}-800 text-white px-4 py-2 rounded-lg",
        'keyword_item' => "bg-pink-600 text-white text-xs font-semibold px-4 py-2 rounded-lg", // Specific colors, not themed
        'hashtag_item' => "bg-purple-600 text-white text-xs font-semibold px-4 py-2 rounded-lg", // Specific colors, not themed
        'poll_option' => "inline-flex items-center text-{$theme_color}-300 cursor-pointer bg-{$theme_color}-800 text-white px-4 py-2 rounded-lg",
        'tab_button_base' => "py-3 px-6 rounded-t-lg font-semibold cursor-pointer transition-colors duration-200 ease-in-out border-b-2 border-b-transparent",
    ];
}
$component_classes = get_themed_component_classes($theme, $color);


function render_copy_button(array $app_texts_raw, $theme_color, $targetId, $buttonClasses, $onclickFunction = 'copyToClipboard', $jsParam1 = false, $jsParam2 = null, $titleKey = 'copy_tooltip_default', $iconClass = 'fas fa-copy') {
	$title = get_themed_text($app_texts_raw, $titleKey, $theme_color);
	$onclickParams = "event, '" . addslashes($targetId) . "'";
	if ($onclickFunction === 'copyToClipboard') {
		$onclickParams .= ", " . ($jsParam1 ? 'true' : 'false');
		if ($jsParam2 !== null) $onclickParams .= ", '" . addslashes($jsParam2) . "'";
	} elseif ($onclickFunction === 'copyAllListItems') {
		if ($jsParam1 !== false && $jsParam1 !== null) $onclickParams .= ", '" . addslashes($jsParam1) . "'";
	}
	return "<button onclick=\"{$onclickFunction}({$onclickParams})\" class=\"{$buttonClasses}\" title=\"" . htmlspecialchars($title) . "\"><i class=\"{$iconClass}\"></i></button>";
}

function render_detail_item(array $app_texts_raw, array $classes, $theme_color, $sectionTitleKey, $content, $elementId) {
	if (!isset($content) || $content === '') return;
	$sectionTitle = get_themed_text($app_texts_raw, $sectionTitleKey, $theme_color);
	echo "<div class=\"{$classes['content_box']} relative pr-12\">";
	echo "<h3 class=\"{$classes['section_title']}\">{$sectionTitle}</h3>";
	echo "<p id=\"{$elementId}\" class=\"{$classes['paragraph']} pr-10\">" . htmlspecialchars($content) . "</p>";
	echo render_copy_button($app_texts_raw, $theme_color, $elementId, $classes['btn_absolute']);
	echo "</div>";
}

function render_markdown_detail_item(array $app_texts_raw, array $classes, Parsedown $Parsedown, $theme_color, $sectionTitleKey, $markdownContent, $elementId) {
	if (!isset($markdownContent) || $markdownContent === '') return;
	$sectionTitle = get_themed_text($app_texts_raw, $sectionTitleKey, $theme_color);
	echo "<div class=\"{$classes['content_box']} relative pr-12\">";
	echo "<div><h3 class=\"{$classes['section_title']}\">{$sectionTitle}</h3>";
	echo "<div id=\"{$elementId}\" class=\"{$classes['paragraph']} markdown-content pr-10\">" . $Parsedown->text($markdownContent) . "</div></div>";
	echo render_copy_button($app_texts_raw, $theme_color, $elementId, $classes['btn_absolute']);
	echo "</div>";
}

function render_list_block(array $app_texts_raw, array $classes, $theme_color, $sectionTitleKey, $items, $listId, $itemIdPrefix, $itemBaseClasses, $ulClasses, $isEmoji = false) {
	if (!is_array($items) || empty($items)) return;
	$sectionTitle = get_themed_text($app_texts_raw, $sectionTitleKey, $theme_color);
	echo "<div class=\"{$classes['content_box']}\"><h3 class=\"{$classes['section_title']}\">{$sectionTitle}</h3>";
	$finalUlClasses = $ulClasses . ($isEmoji ? " text-2xl" : "");
	echo "<ul id=\"{$listId}\" class=\"{$finalUlClasses}\">";
	foreach ($items as $index => $item) {
		$itemId = $itemIdPrefix . '-' . $index;
		echo "<li id=\"{$itemId}\" class=\"{$itemBaseClasses} relative pr-10 flex items-center\">" . htmlspecialchars($item);
		echo render_copy_button($app_texts_raw, $theme_color, $itemId, $classes['btn_list_item_absolute']) . "</li>";
	}
	echo "</ul>";
	echo render_copy_button($app_texts_raw, $theme_color, $listId, $classes['btn_absolute'], 'copyAllListItems', false, null, 'copy_tooltip_all');
	echo "</div>";
}

function render_color_list_block(array $app_texts_raw, array $classes, $theme_color, $sectionTitleKey, $colors, $listId) {
	if (!is_array($colors) || empty($colors)) return;
	$sectionTitle = get_themed_text($app_texts_raw, $sectionTitleKey, $theme_color);
	echo "<div class=\"{$classes['content_box']}\"><h3 class=\"{$classes['section_title']}\">{$sectionTitle}</h3>";
	echo "<ul id=\"{$listId}\" class=\"flex flex-wrap gap-2 mb-4\">";
	foreach ($colors as $index => $color_val) { // Renamed $color to $color_val to avoid conflict with global $color
		$itemId = 'color-' . $index;
		$safeColor = htmlspecialchars($color_val);
		// Using $theme_color for the list item text color for consistency, background is the actual color
		echo "<li id=\"{$itemId}\" class=\"inline-flex items-center font-semibold px-4 py-2 rounded-lg text-xs bg-{$theme_color}-700 text-{$theme_color}-200 relative pr-10\" style=\"background-color: {$safeColor};\">{$safeColor}";
		echo render_copy_button($app_texts_raw, $theme_color, $itemId, $classes['btn_list_item_absolute']) . "</li>";
	}
	echo "</ul>";
	echo render_copy_button($app_texts_raw, $theme_color, $listId, $classes['btn_absolute'], 'copyAllListItems', 'li', null, 'copy_tooltip_all');
	echo "</div>";
}

function render_media_block(array $app_texts_raw, array $classes, $theme_color, $sectionTitleKey, $fileName, $altTextKey, $mediaType, $mediaElementId, $mediaClasses, $basePath, $selectedFolder, $mediaBaseUrl) {
	if (empty($fileName)) return;
	$safeSelectedFolder = basename($selectedFolder ?? '');
	$safeFileName = basename($fileName);
	$filePath = $basePath . '/' . $safeSelectedFolder . '/' . $safeFileName;
	if (!file_exists($filePath) || !is_file($filePath)) return;

	$sectionTitle = get_themed_text($app_texts_raw, $sectionTitleKey, $theme_color);
	$altText = htmlspecialchars(get_themed_text($app_texts_raw, $altTextKey, $theme_color));
	$sourceUrl = htmlspecialchars($mediaBaseUrl . urlencode($safeFileName));

	echo "<div class=\"{$classes['content_box']}\"><h3 class=\"{$classes['section_title']}\">{$sectionTitle}</h3><div class=\"relative\">";
	if ($mediaType === 'image') {
		echo "<img src=\"{$sourceUrl}\" alt=\"{$altText}\" class=\"{$mediaClasses}\" id=\"{$mediaElementId}\" />";
	} elseif ($mediaType === 'video') {
		echo "<video controls class=\"{$mediaClasses}\" id=\"{$mediaElementId}\">";
		echo "<source src=\"{$sourceUrl}\" type=\"" . get_mime_type($safeFileName) . "\">";
		echo htmlspecialchars(get_themed_text($app_texts_raw, 'video_unsupported_browser', $theme_color));
		echo "</video>";
	}
	echo render_copy_button($app_texts_raw, $theme_color, $mediaElementId, $classes['btn_absolute'], 'copyToClipboard', true);
	echo "</div></div>";
}

function render_tab_navigation_link(array $app_texts_raw, $theme_color_main, $accent_color, $tabKey, $tabDisplayNameKey, $selectedFolder, $selectedTab, $baseClasses) {
	$tabDisplayName = get_themed_text($app_texts_raw, $tabDisplayNameKey, $theme_color_main);
	$url = "?selected_folder=" . urlencode($selectedFolder ?? '') . "&tab=" . urlencode($tabKey);
	// Use the passed $theme_color_main and $accent_color for tab styling
	$activeClass = ($selectedTab === $tabKey) ? "bg-{$accent_color}-600 text-white border-{$accent_color}-600" : "bg-{$theme_color_main}-700 text-{$theme_color_main}-300 hover:bg-{$accent_color}-600";
	return "<a href=\"{$url}\" class=\"{$baseClasses} {$activeClass}\">{$tabDisplayName}</a>";
}

class Parsedown {
	protected $text, $markup;
	function text($text) { $this->text = $text; $this->markup = $this->lines($text); return $this->markup; }
	protected function lines($text) { $lines = explode("\n", $text); $markup = ''; foreach ($lines as $line) $markup .= $this->line($line); return $markup; }
	protected function line($line) {
		$line = preg_replace('/^(\s*)\#\#\#\s*(.*)/', '$1<h3>$2</h3>', $line);
		$line = preg_replace('/^(\s*)\#\#\s*(.*)/', '$1<h2>$2</h2>', $line);
		$line = preg_replace('/^(\s*)\#\s*(.*)/', '$1<h1>$2</h1>', $line);
		$line = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $line);
		$line = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $line);
		$line = preg_replace('/^\s*>\s*(.*)/', '<blockquote>$1</blockquote>', $line);
		$line = preg_replace('/^\s*-\s*(.*)/', '<li>$1</li>', $line);
		$line = preg_replace('/^\s*\d+\.\s*(.*)/', '<li>$1</li>', $line);
		if (!preg_match('/^(<h|<blockquote|<li)/', $line)) $line = '<p>' . $line . '</p>';
		return $line . "\n";
	}
}

function get_mime_type($filename) {
	$mimes = ['jpg'=>'image/jpeg','jpeg'=>'image/jpeg','png'=>'image/png','gif'=>'image/gif','mp4'=>'video/mp4','webm'=>'video/webm'];
	$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
	return $mimes[$ext] ?? 'application/octet-stream';
}

function parse_markdown_document($fileContent) {
	$parts = explode('---', $fileContent, 3);
	if (count($parts) < 3) { error_log("Invalid markdown: Missing YAML delimiters."); return null; }
	$frontMatterString = trim($parts[1]); $markdownContent = trim($parts[2]);
	$metadata = []; $lines = explode("\n", $frontMatterString);
	$currentKey = null; $isMultiLineString = false; $isList = false;
	foreach ($lines as $line) {
		$trimmedLine = trim($line); $indentation = strlen($line) - strlen(ltrim($line));
		if ($isMultiLineString) {
			if ($indentation > 0 || empty($trimmedLine)) { $metadata[$currentKey] .= "\n" . ltrim($line); continue; }
			else { $isMultiLineString = false; }
		}
		if ($isList && str_starts_with($trimmedLine, '-')) {
			if (!isset($metadata[$currentKey]) || !is_array($metadata[$currentKey])) $metadata[$currentKey] = [];
			$metadata[$currentKey][] = trim(substr($trimmedLine, 1), ' "'); continue;
		}
		if (strpos($line, ':') !== false) {
			[$key, $value] = array_map('trim', explode(':', $line, 2));
			$currentKey = $key; $isMultiLineString = false; $isList = false;
			if ($value === '|') { $isMultiLineString = true; $metadata[$key] = ''; }
			elseif (empty($value) && str_ends_with($line, ':')) { $isList = true; if (!isset($metadata[$key])) $metadata[$key] = []; }
			elseif (str_starts_with($value, '"') && str_ends_with($value, '"')) { $metadata[$key] = trim($value, '"'); }
			elseif ($value === 'true') { $metadata[$key] = true; }
			elseif (is_numeric($value)) { $metadata[$key] = (float)$value; }
			else { $metadata[$key] = $value; }
		} elseif (str_starts_with($trimmedLine, '-') && $currentKey !== null) {
			if (!isset($metadata[$currentKey]) || !is_array($metadata[$currentKey])) $metadata[$currentKey] = [];
			$metadata[$currentKey][] = trim(substr($trimmedLine, 1), ' "'); $isList = true;
		} else { if(!empty($trimmedLine)) error_log("Warning: Unhandled YAML line for key '$currentKey': '$line'"); }
	}
	return ['metadata' => $metadata, 'content' => $markdownContent];
}

if (isset($_GET['get_media'], $_GET['folder'], $_GET['file_name']) && $_GET['get_media'] === 'true') {
	$folderName = basename($_GET['folder']); $fileName = basename($_GET['file_name']);
	$filePath = $basePath . '/' . $folderName . '/' . $fileName;
	if (file_exists($filePath) && is_file($filePath)) {
		header('Content-Type: ' . get_mime_type($fileName));
		header('Content-Length: ' . filesize($filePath));
		readfile($filePath); exit;
	} else { http_response_code(404); echo htmlspecialchars(get_themed_text($app_texts_raw, 'error_file_not_found_media', $theme)); exit; }
}

$selectedFolder = isset($_GET['selected_folder']) ? basename($_GET['selected_folder']) : null;
$selectedTab = $_GET['tab'] ?? 'details';
$currentDocument = null; $allFolders = [];

if (is_dir($basePath)) {
	$folders = array_filter(glob($basePath . '/*'), 'is_dir');
	foreach ($folders as $folderPath) {
		$folderName = basename($folderPath);
		$indexPath = $folderPath . '/index.md';
		$documentTitle = $folderName;
		if (file_exists($indexPath)) {
			$fileContent = file_get_contents($indexPath);
			if ($fileContent !== false) {
				$parsedDoc = parse_markdown_document($fileContent);
				if ($parsedDoc && !empty($parsedDoc['metadata']['title'])) {
					$documentTitle = $parsedDoc['metadata']['title'];
				}
			}
		}
		$allFolders[] = ['folder' => $folderName, 'title' => $documentTitle];
	}
	usort($allFolders, fn($a, $b) => strcmp($a['title'], $b['title']));

	if ($selectedFolder && in_array($selectedFolder, array_column($allFolders, 'folder'))) {
		$indexPath = $basePath . '/' . $selectedFolder . '/index.md';
		if (file_exists($indexPath)) {
			$fileContent = file_get_contents($indexPath);
			if ($fileContent !== false) {
				$currentDocument = parse_markdown_document($fileContent);
				if (!$currentDocument) {
					$currentDocument = ['metadata' => ['title' => 'Error'], 'content' => get_themed_text($app_texts_raw, 'error_could_not_parse', $theme)];
				}
			} else {
				$currentDocument = ['metadata' => ['title' => 'Error Reading File'], 'content' => get_themed_text($app_texts_raw, 'error_reading_file', $theme)];
			}
		} else {
			$currentDocument = ['metadata' => ['title' => 'Not Found'], 'content' => get_themed_text($app_texts_raw, 'error_index_md_not_found', $theme)];
		}
	}
} else {
	$currentDocument = ['metadata' => ['title' => 'Error'], 'content' => get_themed_text($app_texts_raw, 'error_content_dir_not_found', $theme)];
}

$Parsedown = new Parsedown();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo htmlspecialchars(get_themed_text($app_texts_raw, 'page_title', $theme)); ?></title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="p-4 sm:p-8 font-inter bg-<?php echo htmlspecialchars($theme); ?>-900 text-<?php echo htmlspecialchars($theme); ?>-200">
	<div class="max-w-6xl mx-auto bg-<?php echo htmlspecialchars($theme); ?>-800 shadow-xl rounded-lg p-6 sm:p-8 flex flex-col md:flex-row gap-8">
		<div class="md:w-1/4">
			<?php if (empty($allFolders)) : ?>
				<p class="text-<?php echo htmlspecialchars($theme); ?>-400"><?php echo get_themed_text($app_texts_raw, 'no_document_selected_folder_list', $theme); ?></p>
			<?php else: ?>
				<div id="folder-list" class="space-y-2">
					<?php foreach ($allFolders as $docInfo) { ?>
						<a href="?selected_folder=<?php echo urlencode($docInfo['folder']); ?>&tab=<?php echo urlencode($selectedTab); ?>"
							class="folder-item block cursor-pointer py-3 px-4 rounded-lg transition-colors duration-200 ease-in-out mb-2 font-semibold text-<?php echo htmlspecialchars($theme); ?>-400
							<?php echo ($selectedFolder === $docInfo['folder']) ? "bg-{$color}-600 text-white" : "bg-{$theme}-700 hover:bg-{$theme}-700 hover:text-white"; ?>">
							<?php echo htmlspecialchars($docInfo['title']); ?>
						</a>
					<?php } ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="md:w-3/4">
			<h1 class="text-2xl sm:text-3xl font-extrabold text-center text-<?php echo htmlspecialchars($color); ?>-400 mb-6">
				<?php
					$main_h1_text = get_themed_text($app_texts_raw, 'page_title', $theme);
					if (isset($currentDocument['metadata']['title'])) {
						$main_h1_text = htmlspecialchars($currentDocument['metadata']['title']);
					}
					echo $main_h1_text;
				?>
			</h1>
			<div id="documents-container" class="space-y-10">
				<?php if ($currentDocument) { ?>
					<div class="bg-<?php echo htmlspecialchars($theme); ?>-800 text-<?php echo htmlspecialchars($theme); ?>-200 rounded-lg shadow-md">
						<div class="flex gap-4">
							<?php
								echo render_tab_navigation_link($app_texts_raw, $theme, $color, 'details', 'tab_details', $selectedFolder, $selectedTab, $component_classes['tab_button_base']);
								echo render_tab_navigation_link($app_texts_raw, $theme, $color, 'social', 'tab_social', $selectedFolder, $selectedTab, $component_classes['tab_button_base']);
								echo render_tab_navigation_link($app_texts_raw, $theme, $color, 'media', 'tab_media', $selectedFolder, $selectedTab, $component_classes['tab_button_base']);
								echo render_tab_navigation_link($app_texts_raw, $theme, $color, 'content', 'tab_content', $selectedFolder, $selectedTab, $component_classes['tab_button_base']);
							?>
						</div>

						<div class="tab-content p-6 bg-<?php echo htmlspecialchars($theme); ?>-800 rounded-bl-lg rounded-br-lg rounded-tr-lg border border-<?php echo htmlspecialchars($theme); ?>-700 ">
							<?php if ($selectedTab === 'details') { ?>
								<h2 class="text-2xl font-bold mb-2"><?php echo htmlspecialchars($currentDocument['metadata']['title'] ?? 'Untitled Document'); ?></h2>
								<?php
								render_detail_item($app_texts_raw, $component_classes, $theme, 'section_title_slug', $currentDocument['metadata']['slug'] ?? null, 'slug-content');
								render_detail_item($app_texts_raw, $component_classes, $theme, 'section_title_date', isset($currentDocument['metadata']['date']) ? date('H:i:s d/m/Y', strtotime($currentDocument['metadata']['date'])) : null, 'date-content');
								render_detail_item($app_texts_raw, $component_classes, $theme, 'section_title_description', $currentDocument['metadata']['description'] ?? null, 'description-content');
								render_markdown_detail_item($app_texts_raw, $component_classes, $Parsedown, $theme, 'section_title_extract', $currentDocument['metadata']['extract'] ?? null, 'extract-content');
								?>
							<?php } elseif ($selectedTab === 'social') { ?>
								<?php
								render_list_block($app_texts_raw, $component_classes, $theme, 'section_title_keywords', $currentDocument['metadata']['keywords'] ?? [], 'keyword-list', 'keyword-item', $component_classes['keyword_item'], "flex flex-wrap gap-2 mb-4");
								render_list_block($app_texts_raw, $component_classes, $theme, 'section_title_hashtags', $currentDocument['metadata']['hashtags'] ?? [], 'hashtag-list', 'hashtag-item', $component_classes['hashtag_item'], "flex flex-wrap gap-2 mb-4");
								render_list_block($app_texts_raw, $component_classes, $theme, 'section_title_emojis', $currentDocument['metadata']['emojis'] ?? [], 'emoji-list', 'emoji', '', "flex flex-wrap gap-2 mb-4", true);
								?>

								<?php if (isset($currentDocument['metadata']['pool_question']) || isset($currentDocument['metadata']['pool_options']) || isset($currentDocument['metadata']['pool_cta'])) { ?>
									<div class="<?php echo $component_classes['content_box']; ?>">
										<h3 class="<?php echo $component_classes['section_title']; ?>"><?php echo get_themed_text($app_texts_raw, 'section_title_poll', $theme); ?></h3>
										<div id="poll-content">
											<?php if (isset($currentDocument['metadata']['pool_question']) && !empty($currentDocument['metadata']['pool_question'])) { ?>
												<div class="relative pr-12">
													<div id="poll-question-content" class="text-lg font-semibold mb-2 text-<?php echo htmlspecialchars($theme); ?>-400 p-4"><?php echo $Parsedown->text($currentDocument['metadata']['pool_question']); ?></div>
													<?php echo render_copy_button($app_texts_raw, $theme, 'poll-question-content', $component_classes['btn_absolute']); ?>
												</div>
											<?php } ?>
											<?php if (isset($currentDocument['metadata']['pool_options']) && is_array($currentDocument['metadata']['pool_options']) && !empty($currentDocument['metadata']['pool_options'])) { ?>
												<div id="poll-options-list" class="flex flex-col gap-2 mb-4">
													<?php foreach ($currentDocument['metadata']['pool_options'] as $index => $option) { ?>
														<label id="poll-option-<?php echo $index; ?>" class="<?php echo $component_classes['poll_option']; ?> relative pr-10">
															<input type="radio" name="pool_option" value="<?php echo htmlspecialchars($option); ?>" class="form-radio h-4 w-4 text-<?php echo htmlspecialchars($theme); ?>-700 bg-<?php echo htmlspecialchars($theme); ?>-900 border-<?php echo htmlspecialchars($theme); ?>-700 focus:ring-<?php echo htmlspecialchars($color); ?>-600 rounded-full">
															<span class="ml-2"><?php echo htmlspecialchars($option); ?></span>
															<?php echo render_copy_button($app_texts_raw, $theme, 'poll-option-' . $index, $component_classes['btn_list_item_absolute'], 'copyToClipboard', false, 'label'); ?>
														</label>
													<?php } ?>
												</div>
											<?php } ?>
											<?php if (isset($currentDocument['metadata']['pool_cta']) && !empty($currentDocument['metadata']['pool_cta'])) { ?>
												<div class="relative pr-12">
													<div id="poll-cta-content" class="text-lg text-<?php echo htmlspecialchars($theme); ?>-400 mb-4 p-4"><?php echo $Parsedown->text($currentDocument['metadata']['pool_cta']); ?></div>
													<?php echo render_copy_button($app_texts_raw, $theme, 'poll-cta-content', $component_classes['btn_absolute']); ?>
												</div>
											<?php } ?>
										</div>
										<?php echo render_copy_button($app_texts_raw, $theme, 'poll-content', $component_classes['btn_absolute'] . " mt-4", 'copyAllListItems', false, null, 'copy_tooltip_all'); ?>
									</div>
								<?php } ?>
								<?php render_list_block($app_texts_raw, $component_classes, $theme, 'section_title_facts', $currentDocument['metadata']['facts'] ?? [], 'facts-list', 'fact', $component_classes['list_item_base'] . " mb-2", "list-disc list-inside text-{$theme}-300 ml-6 mb-4"); ?>
								<?php if (isset($currentDocument['metadata']['cta']) && !empty($currentDocument['metadata']['cta'])) { ?>
									<div class="<?php echo $component_classes['content_box']; ?> ">
										<div>
											<h3 class="<?php echo $component_classes['section_title']; ?>"><?php echo get_themed_text($app_texts_raw, 'section_title_cta', $theme); ?></h3>
											<p id="cta-content" class="text-base font-semibold text-teal-400 pr-10"><?php echo $Parsedown->text($currentDocument['metadata']['cta']); ?></p>
										</div>
										<?php echo render_copy_button($app_texts_raw, $theme, 'cta-content', $component_classes['btn_absolute']); ?>
									</div>
								<?php } ?>
								<?php
								$socialFieldsDisplayed = (!empty($currentDocument['metadata']['keywords']) || !empty($currentDocument['metadata']['hashtags']) || !empty($currentDocument['metadata']['emojis']) || !empty($currentDocument['metadata']['pool_question']) || !empty($currentDocument['metadata']['pool_options']) || !empty($currentDocument['metadata']['pool_cta']) || !empty($currentDocument['metadata']['facts']) || !empty($currentDocument['metadata']['cta']));
								if (!$socialFieldsDisplayed) echo '<p class="text-center text-' . htmlspecialchars($theme) . '-400 italic mt-4">' . htmlspecialchars(get_themed_text($app_texts_raw, 'no_social_info', $theme)) . '</p>';
								?>
							<?php } elseif ($selectedTab === 'media') { ?>
								<?php
									render_color_list_block($app_texts_raw, $component_classes, $theme, 'section_title_colors', $currentDocument['metadata']['color'] ?? [], 'color-list');
									$mediaBaseUrl = '?get_media=true&folder=' . urlencode($selectedFolder ?? '') . '&file_name=';
									$anyMediaDisplayed = !empty($currentDocument['metadata']['color']);

									render_media_block($app_texts_raw, $component_classes, $theme, 'section_title_widescreen', $currentDocument['metadata']['widescreen'] ?? null, 'alt_widescreen', 'image', 'widescreen-image', $component_classes['image_base'], $basePath, $selectedFolder, $mediaBaseUrl);
									if(!empty($currentDocument['metadata']['widescreen']) && file_exists($basePath.'/'.basename($selectedFolder ?? '').'/'.basename($currentDocument['metadata']['widescreen']))) $anyMediaDisplayed = true;

									render_media_block($app_texts_raw, $component_classes, $theme, 'section_title_square', $currentDocument['metadata']['square'] ?? null, 'alt_square', 'image', 'square-image', $component_classes['image_base'], $basePath, $selectedFolder, $mediaBaseUrl);
									if(!empty($currentDocument['metadata']['square']) && file_exists($basePath.'/'.basename($selectedFolder ?? '').'/'.basename($currentDocument['metadata']['square']))) $anyMediaDisplayed = true;

									render_media_block($app_texts_raw, $component_classes, $theme, 'section_title_sticker', $currentDocument['metadata']['sticker'] ?? null, 'alt_sticker', 'image', 'sticker-image', $component_classes['sticker_image'], $basePath, $selectedFolder, $mediaBaseUrl);
									if(!empty($currentDocument['metadata']['sticker']) && file_exists($basePath.'/'.basename($selectedFolder ?? '').'/'.basename($currentDocument['metadata']['sticker']))) $anyMediaDisplayed = true;

									render_media_block($app_texts_raw, $component_classes, $theme, 'section_title_video', $currentDocument['metadata']['video'] ?? null, 'alt_video', 'video', 'video-content', $component_classes['video'], $basePath, $selectedFolder, $mediaBaseUrl);
									if(!empty($currentDocument['metadata']['video']) && file_exists($basePath.'/'.basename($selectedFolder ?? '').'/'.basename($currentDocument['metadata']['video']))) $anyMediaDisplayed = true;

									if (!$anyMediaDisplayed) echo '<p class="col-span-full text-center text-' . htmlspecialchars($theme) . '-400 italic mt-4">' . htmlspecialchars(get_themed_text($app_texts_raw, 'no_media_info', $theme)) . '</p>';
								?>
							<?php } elseif ($selectedTab === 'content') { ?>
								<div class="<?php echo $component_classes['content_box']; ?> ">
									<div class="<?php echo $component_classes['content_box']; ?> ">
										<h2 class="text-2xl font-bold text-<?php echo htmlspecialchars($color); ?>-400" id="content-title">
											<?php
												$content_tab_h2 = get_themed_text($app_texts_raw, 'section_title_main_content_heading', $theme);
												if (isset($currentDocument['metadata']['title'])) {
													$content_tab_h2 = htmlspecialchars($currentDocument['metadata']['title']);
												}
												echo $content_tab_h2;
											?>
										</h2>
										<?php echo render_copy_button($app_texts_raw, $theme, 'content-title', $component_classes['btn_absolute']); ?>
									</div>
									<div class="markdown-content <?php echo $component_classes['content_box']; ?> " id="content-content">
										<?php echo $Parsedown->text($currentDocument['content'] ?? ''); ?>
										<?php echo render_copy_button($app_texts_raw, $theme, 'content-content', $component_classes['btn_absolute']); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } else { ?>
					<p class="text-center text-<?php echo htmlspecialchars($theme); ?>-400"><?php echo get_themed_text($app_texts_raw, 'no_document_selected_main_area', $theme); ?></p>
				<?php } ?>
			</div>
		</div>
	</div>

	<script>
		function copyToClipboard(event, elementId, isMediaUrl = false, specificTag = null) {
			let textToCopy = '';
			const element = document.getElementById(elementId);
			const button = event.currentTarget;
			if (!element) return;

			if (isMediaUrl) {
				const mediaElement = element.tagName === 'IMG' || element.tagName === 'VIDEO' || element.tagName === 'SOURCE' ? element : element.querySelector('img, video, source');
				if (mediaElement) textToCopy = mediaElement.src;
			} else if (specificTag === 'label') {
				const spanElement = element.querySelector('span.ml-2');
				if (spanElement) textToCopy = spanElement.innerText.trim();
			} else {
				textToCopy = element.innerText.trim();
			}

			if (textToCopy) {
				navigator.clipboard.writeText(textToCopy).then(() => {
					if (button) {
						const originalIcon = button.innerHTML;
						button.innerHTML = '<i class="fas fa-check"></i>';
						setTimeout(() => { button.innerHTML = originalIcon; }, 1500);
					}
				}).catch(err => console.error('Oops, unable to copy', err));
			}
		}

		function copyAllListItems(event, containerId, itemSelector = 'li') {
			const container = document.getElementById(containerId);
			const button = event.currentTarget;
			if (!container) return;

			const items = Array.from(container.querySelectorAll(itemSelector));
			const textToCopy = items.map(item => {
				let itemText = item.innerText.trim();
				if (itemSelector === 'label') {
					const spanElement = item.querySelector('span.ml-2');
					if (spanElement) itemText = spanElement.innerText.trim();
				}
				return itemText;
			}).join('\n');

			if (textToCopy) {
				navigator.clipboard.writeText(textToCopy).then(() => {
					if (button) {
						const originalIcon = button.innerHTML;
						button.innerHTML = '<i class="fas fa-check"></i>';
						setTimeout(() => { button.innerHTML = originalIcon; }, 1500);
					}
				}).catch(err => console.error('Oops, unable to copy all', err));
			}
		}
	</script>
</body>
</html>