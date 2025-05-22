<?php
$title = $_POST['title'] ?? null;
$story = $_POST['story'] ?? null;
$description = $_POST['description'] ?? null;
$extract = $_POST['extract'] ?? null;
$keywords = $_POST['keywords'] ?? null;
$emojis = $_POST['emojis'] ?? null;
$hashtags = $_POST['hashtags'] ?? null;
$call_to_action = $_POST['call_to_action'] ?? null;
$pool = $_POST['pool'] ?? null;
$fun_facts = $_POST['fun_facts'] ?? null;

$square = $_FILES['square'] ?? null;
$square_webp = $_FILES['square_webp'] ?? null;
$sticker = $_FILES['sticker'] ?? null;
$sticker_webp = $_FILES['sticker_webp'] ?? null;
$widescreen = $_FILES['widescreen'] ?? null;
$widescreen_webp = $_FILES['widescreen_webp'] ?? null;
$depth_map = $_FILES['depth_map'] ?? null;
$depth_map_webp = $_FILES['depth_map_webp'] ?? null; // This is not used in the form, but kept for completeness
$video = $_FILES['video'] ?? null;
$video_webp = $_FILES['video_webp'] ?? null; // This is not used in the form, but kept for completeness


$input_css = 'w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-blue-600 dark:focus:border-blue-600';

$file_input_css = 'block w-full text-sm text-gray-500 dark:text-gray-400
                file:mr-4 file:py-2 file:px-4
                file:rounded-md file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100 dark:file:bg-gray-600 dark:file:text-gray-100 dark:hover:file:bg-gray-500';


$formFields = [
    'title' => [
        'label' => 'Story Title',
        'id' => 'title',
        'name' => 'title',
        'type' => 'text',
        'value' => htmlspecialchars($title ?? ''),
        'required' => true,
         'color' =>'yellow',
        'tab' => 'basic',
        'column' => 'full',
        'placeholder' => 'Enter the title of your story...',
        'instructions' => 'This will be the main title displayed for the story.',
    ],
    'story' => [
        'label' => 'Story Content',
        'id' => 'story',
        'name' => 'story',
        'type' => 'textarea',
        'value' => htmlspecialchars($story ?? ''),
        'placeholder' => 'Write the main content of your story here...',
        'instructions' => 'Use Markdown syntax for formatting (e.g., # Headings, *italics*, **bold**, [links](url)).',
        'required' => false,
        'rows' => 10,
         'color' =>'yellow',
        'tab' => 'basic',
        'column' => 'full',
    ],
    'description' => [
        'label' => 'Description',
        'id' => 'description',
        'name' => 'description',
        'type' => 'textarea',
        'value' => htmlspecialchars($description ?? ''),
        'placeholder' => 'Provide a brief summary or description of the story...',
        'instructions' => 'This will be used in lists or previews. Markdown is supported.',
        'required' => false,
        'rows' => 10,
         'color' =>'yellow',
        'tab' => 'basic',
        'column' => 'full',
    ],
    'extract' => [
        'label' => 'Extract',
        'id' => 'extract',
        'name' => 'extract',
        'type' => 'textarea',
        'value' => htmlspecialchars($extract ?? ''),
        'required' => false,
        'rows' => 4,
         'color' =>'yellow',
        'tab' => 'basic',
        'column' => 'full',
        'placeholder' => 'Write a short description for search engine results...',
        'instructions' => 'Summarize the story content for search engine snippets.',
    ],
    'keywords' => [
        'label' => 'Keywords',
        'id' => 'keywords',
        'name' => 'keywords',
        'type' => 'separated_input',
        'value' => htmlspecialchars($keywords ?? ''),
        'placeholder' => 'Add keywords...',
        'instructions' => 'Enter relevant keywords separated by commas. Press Enter or comma to add a tag.',
        'separator' => ',',
        'required' => false,
        'css' => '',
        'tab' => 'metadata',
        'column' => 'half',
    ],
    'emojis' => [
        'label' => 'Emojis',
        'id' => 'emojis',
        'name' => 'emojis',
        'type' => 'separated_input',
        'value' => htmlspecialchars($emojis ?? ''),
        'placeholder' => 'Add Emojis...',
        'instructions' => 'Enter emojis separated by spaces. Press Enter or space to add a tag.',
        'separator' => ' ',
        'required' => false,
        'css' => '',
        'tab' => 'metadata',
        'column' => 'half',
    ],
    'hashtags' => [
        'label' => 'Hashtags',
        'id' => 'hashtags',
        'name' => 'hashtags',
        'type' => 'separated_input',
        'value' => htmlspecialchars($hashtags ?? ''),
        'placeholder' => 'Add hashtags...',
        'instructions' => 'Enter relevant hashtags separated by commas. Press Enter or comma to add a tag.',
        'separator' => ',',
        'required' => false,
        'css' => '',
        'tab' => 'metadata',
        'column' => 'half',
    ],
    'call_to_action' => [
        'label' => 'Call to Actions',
        'id' => 'call_to_action',
        'name' => 'call_to_action',
        'type' => 'textarea',
        'value' => htmlspecialchars($call_to_action ?? ''),
        'required' => false,
        'rows' => 4,
         'color' =>'yellow',
        'tab' => 'extra',
        'column' => 'full',
        'placeholder' => 'Enter call-to-action phrases, one per line...',
        'instructions' => 'These might appear as buttons or links prompting user interaction.',
    ],
    'pool' => [
        'label' => 'Pool Data',
        'id' => 'pool',
        'name' => 'pool',
        'type' => 'textarea',
        'value' => htmlspecialchars($pool ?? ''),
        'instructions' => 'Enter any structured data for the story pool (e.g., JSON, YAML, or plain text).',
        'required' => false,
        'rows' => 4,
         'color' =>'yellow',
        'tab' => 'extra',
        'column' => 'full',
        'placeholder' => 'Enter data for the story pool...',
    ],
    'fun_facts' => [
        'label' => 'Fun Facts',
        'id' => 'fun_facts',
        'name' => 'fun_facts',
        'type' => 'textarea',
        'value' => htmlspecialchars($fun_facts ?? ''),
        'instructions' => 'Enter interesting facts related to the story. Markdown is supported.',
        'required' => false,
        'rows' => 4,
         'color' =>'yellow',
        'tab' => 'extra',
        'column' => 'full',
        'placeholder' => 'Write fun facts here...',
    ],
    'square' => [
        'label' => 'Square Image',
        'id' => 'square',
        'type' => 'file_upload_pair',
        'tab' => 'uploads',
        'column' => 'full',
        'instructions' => 'Upload a square image for the story thumbnail.',
        'files' => [
            'normal' => [
                'label' => 'Normal (jpg)',
                'id' => 'square',
                'name' => 'square',
                'accept' => 'image/jpg',
                'css' => $file_input_css,
            ],
            'webp' => [
                'label' => 'WebP',
                'id' => 'square_webp',
                'name' => 'square_webp',
                'accept' => 'image/webp',
                'css' => $file_input_css,
            ],
        ],
    ],
    'sticker' => [
        'label' => 'Sticker',
        'id' => 'sticker',
        'type' => 'file_upload_pair',
        'tab' => 'uploads',
        'column' => 'full',
        'instructions' => 'Upload a sticker image.',
        'files' => [
            'normal' => [
                'label' => 'Normal (png)',
                'id' => 'sticker',
                'name' => 'sticker',
                'accept' => 'image/png',
                'css' => $file_input_css,
            ],
            'webp' => [
                'label' => 'WebP',
                'id' => 'sticker_webp',
                'name' => 'sticker_webp',
                'accept' => 'image/webp',
                'css' => $file_input_css,
            ],
        ],
    ],
    'widescreen' => [
        'label' => 'Widescreen',
        'id' => 'widescreen',
        'type' => 'file_upload_pair',
        'tab' => 'uploads',
        'column' => 'full',
        'instructions' => 'Upload a widescreen image for banners or headers.',
        'files' => [
            'normal' => [
                'label' => 'Normal (jpg)',
                'id' => 'widescreen',
                'name' => 'widescreen',
                'accept' => 'image/jpg',
                'css' => $file_input_css,
            ],
            'webp' => [
                'label' => 'WebP',
                'id' => 'widescreen_webp',
                'name' => 'widescreen_webp',
                'accept' => 'image/webp',
                'size' => 'widescreen',
                'css' => $file_input_css,
            ],
        ],
    ],
    'depth_map' => [
        'label' => 'Depth Map',
        'id' => 'depth_map',
        'type' => 'file_upload_pair',
        'tab' => 'uploads',
        'column' => 'full',
        'instructions' => 'Upload a depth map image (often grayscale) for 3D effects.',
        'files' => [
            'normal' => [
                'label' => 'Normal (jpg)',
                'id' => 'depth_map',
                'name' => 'depth_map',
                'accept' => 'image/jpg',
                'css' => $file_input_css,
            ],
        ],
    ],
    'video' => [
        'label' => 'Video',
        'id' => 'video',
        'type' => 'file_upload_pair',
        'tab' => 'uploads',
        'column' => 'full',
        'instructions' => 'Upload a video file for the story.',
        'files' => [
            'normal' => [
                'label' => 'Normal (mp4)',
                'id' => 'video',
                'name' => 'video',
                'accept' => 'video/mp4',
                'css' => $file_input_css,
            ],
        ],
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Submission Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .separated-input-tag {
            display: inline-flex;
            align-items: center;
            background-color: #e0e7ff; /* light blue */
            color: #3b82f6; /* blue */
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem; /* rounded-md */
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 0.875rem; /* text-sm */
        }
        .separated-input-tag button {
            margin-left: 0.5rem;
            color: #3b82f6; /* blue */
            font-weight: bold;
            background: none;
            border: none;
            cursor: pointer;
        }
        .dark .separated-input-tag {
            background-color: #4b5563; /* dark gray */
            color: #d1d5db; /* light gray */
        }
        .dark .separated-input-tag button {
            color: #d1d5db; /* light gray */
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Submit Your Story</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-6">
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button type="button" class="tab-button inline-flex items-center px-1 py-4 border-b-2 font-medium text-sm focus:outline-none" data-tab="basic">
                            Basic Info
                        </button>
                        <button type="button" class="tab-button inline-flex items-center px-1 py-4 border-b-2 font-medium text-sm focus:outline-none" data-tab="metadata">
                            Metadata
                        </button>
                        <button type="button" class="tab-button inline-flex items-center px-1 py-4 border-b-2 font-medium text-sm focus:outline-none" data-tab="extra">
                            Extra Fields
                        </button>
                        <button type="button" class="tab-button inline-flex items-center px-1 py-4 border-b-2 font-medium text-sm focus:outline-none" data-tab="uploads">
                            File Uploads
                        </button>
                    </nav>
                </div>
            </div>

            <div id="basic" class="tab-content">
                <div class="grid grid-cols-1 gap-6">
                    <?php
                    foreach ($formFields as $field) {
                        if ($field['tab'] === 'basic') {
                            echo '<div class="' . ($field['column'] === 'full' ? 'col-span-1' : 'md:col-span-1') . '">';
                            echo '<label for="' . $field['id'] . '" class="block text-sm font-medium text-gray-700 dark:text-gray-300">' . $field['label'];
                            if (isset($field['required']) && $field['required']) {
                                echo ' <span class="text-red-500">*</span>';
                            }
                            echo '</label>';
                            if ($field['type'] === 'text') {
                                echo '<input type="text" id="' . $field['id'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '" ' . (isset($field['placeholder']) ? 'placeholder="' . $field['placeholder'] . '"' : '') . ' class="' . $field['css'] . '" ' . (isset($field['required']) && $field['required'] ? 'required' : '') . '>';
                            } elseif ($field['type'] === 'textarea') {
                                echo '<textarea id="' . $field['id'] . '" name="' . $field['name'] . '" rows="' . $field['rows'] . '" ' . (isset($field['placeholder']) ? 'placeholder="' . $field['placeholder'] . '"' : '') . ' class="' . $field['css'] . '" ' . (isset($field['required']) && $field['required'] ? 'required' : '') . '>' . $field['value'] . '</textarea>';
                            }
                            if (isset($field['instructions'])) {
                                echo '<p class="mt-2 text-sm text-gray-500 dark:text-gray-400">' . $field['instructions'] . '</p>';
                            }
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div id="metadata" class="tab-content hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php
                    foreach ($formFields as $field) {
                        if ($field['tab'] === 'metadata') {
                            // If 'extract' is full column, ensure it takes full width
                            $columnClass = ($field['column'] === 'full') ? 'col-span-1 md:col-span-2' : 'col-span-1';

                            echo '<div class="' . $columnClass . '">';
                            echo '<label for="' . $field['id'] . '" class="block text-sm font-medium text-gray-700 dark:text-gray-300">' . $field['label'];
                            if (isset($field['required']) && $field['required']) {
                                echo ' <span class="text-red-500">*</span>';
                            }
                            echo '</label>';
                            if ($field['type'] === 'text') {
                                echo '<input type="text" id="' . $field['id'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '" ' . (isset($field['placeholder']) ? 'placeholder="' . $field['placeholder'] . '"' : '') . ' class="' . $field['css'] . '" ' . (isset($field['required']) && $field['required'] ? 'required' : '') . '>';
                            } elseif ($field['type'] === 'textarea') {
                                echo '<textarea id="' . $field['id'] . '" name="' . $field['name'] . '" rows="' . $field['rows'] . '" ' . (isset($field['placeholder']) ? 'placeholder="' . $field['placeholder'] . '"' : '') . ' class="' . $field['css'] . '" ' . (isset($field['required']) && $field['required'] ? 'required' : '') . '>' . $field['value'] . '</textarea>';
                            } elseif ($field['type'] === 'separated_input') {
                                echo '<div class="separated-input-container ' . $field['css'] . ' p-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600">';
                                echo '<div id="' . $field['id'] . '-tags" class="flex flex-wrap items-center mb-2">';
                                echo '</div>';
                                echo '<input type="text" id="' . $field['id'] . '" class="w-full bg-transparent border-none focus:outline-none dark:text-gray-100" placeholder="' . $field['placeholder'] . '" data-separator="' . $field['separator'] . '">';
                                echo '<input type="hidden" name="' . $field['name'] . '" id="' . $field['id'] . '-hidden" value="' . $field['value'] . '">';
                                echo '</div>';
                            }
                            if (isset($field['instructions'])) {
                                echo '<p class="mt-2 text-sm text-gray-500 dark:text-gray-400">' . $field['instructions'] . '</p>';
                            }
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div id="extra" class="tab-content hidden">
                <div class="grid grid-cols-1 gap-6">
                    <?php
                    foreach ($formFields as $field) {
                        if ($field['tab'] === 'extra') {
                            echo '<div class="' . ($field['column'] === 'full' ? 'col-span-1' : 'md:col-span-1') . '">';
                            echo '<label for="' . $field['id'] . '" class="block text-sm font-medium text-gray-700 dark:text-gray-300">' . $field['label'];
                            if (isset($field['required']) && $field['required']) {
                                echo ' <span class="text-red-500">*</span>';
                            }
                            echo '</label>';
                            if ($field['type'] === 'text') {
                                echo '<input type="text" id="' . $field['id'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '" ' . (isset($field['placeholder']) ? 'placeholder="' . $field['placeholder'] . '"' : '') . ' class="' . $field['css'] . '" ' . (isset($field['required']) && $field['required'] ? 'required' : '') . '>';
                            } elseif ($field['type'] === 'textarea') {
                                echo '<textarea id="' . $field['id'] . '" name="' . $field['name'] . '" rows="' . $field['rows'] . '" ' . (isset($field['placeholder']) ? 'placeholder="' . $field['placeholder'] . '"' : '') . ' class="' . $field['css'] . '" ' . (isset($field['required']) && $field['required'] ? 'required' : '') . '>' . $field['value'] . '</textarea>';
                            }
                            if (isset($field['instructions'])) {
                                echo '<p class="mt-2 text-sm text-gray-500 dark:text-gray-400">' . $field['instructions'] . '</p>';
                            }
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div id="uploads" class="tab-content hidden">
                <div class="grid grid-cols-1 gap-6">
                    <?php
                    foreach ($formFields as $field) {
                        if ($field['tab'] === 'uploads' && $field['type'] === 'file_upload_pair') {
                            echo '<div class="col-span-1 rounded-md shadow-sm bg-gray-900 p-4">';
                            echo '<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">' . $field['label'] . '</label>';
                            if (isset($field['instructions'])) {
                                echo '<p class="mt-1 text-sm text-gray-500 dark:text-gray-400 mb-2">' . $field['instructions'] . '</p>';
                            }
                            foreach ($field['files'] as $file_type => $file_info) {
                                echo '<div class="mb-4">';
                                echo '<label for="' . $file_info['id'] . '" class="block text-xs font-medium text-gray-600 dark:text-gray-400 mb-1">' . $file_info['label'] . '</label>';
                                echo '<input type="file" id="' . $file_info['id'] . '" name="' . $file_info['name'] . '" accept="' . $file_info['accept'] . '" class="' . $file_info['css'] . '">';
                                echo '</div>';
                            }
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Submit Story
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            function activateTab(tabId) {
                tabs.forEach(button => {
                    if (button.dataset.tab === tabId) {
                        button.classList.add('border-blue-500', 'text-blue-600');
                        button.classList.remove('border-transparent', 'text-gray-500', 'dark:text-gray-400');
                    } else {
                        button.classList.remove('border-blue-500', 'text-blue-600');
                        button.classList.add('border-transparent', 'text-gray-500', 'dark:text-gray-400');
                    }
                });

                tabContents.forEach(content => {
                    if (content.id === tabId) {
                        content.classList.remove('hidden');
                    } else {
                        content.classList.add('hidden');
                    }
                });
            }

            // Activate the first tab by default
            if (tabs.length > 0) {
                activateTab(tabs[0].dataset.tab);
            }

            tabs.forEach(button => {
                button.addEventListener('click', function() {
                    activateTab(this.dataset.tab);
                });
            });

            // Separated Input (Tags) Logic
            document.querySelectorAll('.separated-input-container input[type="text"]').forEach(inputElement => {
                const hiddenInput = document.getElementById(inputElement.id + '-hidden');
                const tagsContainer = document.getElementById(inputElement.id + '-tags');
                const separator = inputElement.dataset.separator;

                function addTag(value) {
                    if (value.trim() === '') return;

                    const tagDiv = document.createElement('div');
                    tagDiv.classList.add('separated-input-tag');
                    tagDiv.innerHTML = `
                        <span>${value}</span>
                        <button type="button" class="remove-tag">&times;</button>
                    `;
                    tagsContainer.appendChild(tagDiv);

                    tagDiv.querySelector('.remove-tag').addEventListener('click', function() {
                        tagDiv.remove();
                        updateHiddenInput();
                    });
                }

                function updateHiddenInput() {
                    const tags = [];
                    tagsContainer.querySelectorAll('.separated-input-tag span').forEach(span => {
                        tags.push(span.textContent);
                    });
                    hiddenInput.value = tags.join(separator);
                }

                // Populate initial tags from the hidden input's value
                if (hiddenInput.value) {
                    hiddenInput.value.split(separator).forEach(tag => {
                        if (tag.trim() !== '') {
                            addTag(tag.trim());
                        }
                    });
                }

                inputElement.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter' || e.key === separator) {
                        e.preventDefault();
                        const value = inputElement.value.trim();
                        if (value) {
                            addTag(value);
                            updateHiddenInput();
                            inputElement.value = '';
                        }
                    }
                });

                inputElement.addEventListener('blur', function() {
                    const value = inputElement.value.trim();
                    if (value) {
                        addTag(value);
                        updateHiddenInput();
                        inputElement.value = '';
                    }
                });
            });
        });
    </script>
</body>
</html>