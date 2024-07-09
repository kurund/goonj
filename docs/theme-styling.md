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
sass style.scss style.css --style compressed --no-source-map
```

To watch the changes and have live compilation, run:
```sh
cd path/to/theme
sass style.scss style.css --style compressed --no-source-map --watch
```

### Export theme changes

If there are some changes from WordPress dashboard within the theme (like form styling updates from form builder, adding fonts from dashboard, etc) and the changes are not reflected in the version control, we have to export the theme to check in the code.

1. Go to the `Appearance > theme > Goonj Theme > Customize`.
2. Select `Style` from left panel.
3. Click on 3 dots at top right corner
4. Under `Tool`, click on `export`.
5. A folder with theme name `goonj-crm should be downloaded. Replace this with your project theme under `wp-content > themes > goonj-crm`.
6. Commit the changes and push to Github.
