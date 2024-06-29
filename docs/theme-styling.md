# Theme Styling

We're using a block theme in WordPress. The styling can be customized through `Appearance > Theme > Customize` in WP Admin dashboard. You can then access the "Styles" menu item to check further on theme styling.

Read more about [block themes in WordPress](https://www.wpzoom.com/blog/what-are-wordpress-block-themes/#:~:text=Block%20themes%20simplify%20the%20website,customization%20directly%20from%20the%20editor.).

## Custom CSS

### Pre-requisites
- Install Dart Sass - https://sass-lang.com/install
- Verify sass installation
    ```sh
    sass --version
    ```

**NOTE:** Sass comes on multiple platforms and language. Ensure to install Dart Sass.

### Details
Custom styling is handled within the `goonj-crm` theme directory. The CSS is structured as per the following:
```
- goonj-crm/
    - style.scss
    - style.css
    - assets/
        - styles/
            - variables.scss
            - main.scss
            - md.scss
            - lg.scss
            - xl.scss
```

Run the following command to compile the changes and generate the stylesheet:
```sh
cd path/to/theme
sass style.scss style.css --style compressed
```

To watch the changes and have live compilation, run:
```sh
cd path/to/theme
sass style.scss style.css --style compressed --watch
```
