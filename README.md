# WP Theme

## Getting Started

This project follows [WordPress coding standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/) & uses [EditorConfig](https://editorconfig.org) to assist ([get the plugin](https://editorconfig.org/#download)).

TL;DR: space between, use UNIX newlines, end with newline, indent with **hard tabs**.

### Prerequisites

You'll need [npm](https://www.npmjs.com/get-npm) before anything.

### Installing

Ensure you have gulp-cli installed globally:
``` bash
npm remove gulp -g
npm install gulp-cli -g
```

Install development dependencies in theme root:
``` bash
npm install --no-save
```

## Development

For more information run `gulp --tasks` or take a look at `gulpfile.js`

``` bash
# Compile assets and run dev
gulp

# Just watch for file changes and start up Browsersync (if configured with browsersync.json)
gulp dev

# Run with Browsersync for a given host
gulp --proxy=localhost:8080

# Force disable Browsersync (if configured with browsersync.json)
gulp --no-sync
```

### Browsersync

To set defaults create a `browsersync.json` in the theme root ([check out all options](https://browsersync.io/docs/options)). For example:

```json
{
  "proxy": "localhost:8080"
}
```

## Deployment

``` bash
gulp build
```

...to compile minified production-ready assets.
