# BSA Dev

This repository contains the source code for the BSA Test WordPress project, which utilizes the Advanced Custom Fields (ACF) plugin to enhance the functionality and customization options of the WordPress website.

## Project Directory Structure

**─ acf-json/**
<sub>This directory stores saved ACF (Advanced Custom Fields) JSON configurations. It's essential for version control and sharing ACF field settings across environments.</sub>

**─ acf-preview-images/**
<sub>Store preview images for ACF blocks in this directory. These images are used to illustrate and visualize ACF blocks in the WordPress block editor.</sub>

**─ inc/acf.php**
<sub>The `acf.php` file in the 'inc' directory is responsible for registering and managing ACF blocks. Customize ACF block functionality in this file as needed.</sub>

**─ template-parts/blocks/**
<sub>This directory contains template parts for ACF blocks that you've registered. These template parts are used to render the content of your ACF blocks within your WordPress theme. Organize your ACF block templates in separate subdirectories for better organization.</sub>
