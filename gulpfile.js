const gulp   = require( 'gulp' ),

// Utilities
browsersync  = require( 'browser-sync' ).create(),
chalk        = require( 'chalk' ),
del          = require( 'del' ),
sourcemaps   = require( 'gulp-sourcemaps' ),
minimist     = require( 'minimist' ),
notifier     = require( 'node-notifier' ),
pump         = require( 'pump' ),
qrcode       = require( 'qrcode-terminal' ),
stripansi    = require( 'strip-ansi' ),
through      = require( 'through2' ),

// Styles
sass 		 = require('gulp-sass')(require('sass')),
sassglob     = require( 'node-sass-glob-importer' )(),
postcss      = require( 'gulp-postcss' ),
autoprefixer = require( 'autoprefixer' ),
cssmqpacker  = require( 'css-mqpacker' ),
cssmqsorter  = require( 'sort-css-media-queries' ),
csseasings   = require( 'postcss-easings'),
cssinlinesvg = require( 'postcss-inline-svg' ),
cssreporter  = require( 'postcss-reporter' ),
cssurl       = require( 'postcss-url' ),
cleancss     = require( 'gulp-clean-css' ),

// JS
include      = require( 'gulp-include' ),
buble        = require( 'gulp-buble' ), // ES6 transpiler
uglify       = require( 'gulp-uglify' ),

// CLI arguments
PARAMS = minimist( ( process.argv.slice( 2 ) ) );

module.exports = {
	clean,
	styles,
	js,
	dev,

	build: gulp.series(
		function minify( done ) {
			PARAMS.minify = true;
			done();
		},
		clean,
		gulp.parallel( styles, js )
	),

	default: gulp.series(
		gulp.parallel( styles, js ),
		dev
	)
};

function clean() {
	return del( 'dist/**' );
}

function styles( done ) {
	pump( gulp.src( 'styles/*.scss' ),

	PARAMS.minify ? through.obj() : sourcemaps.init(),
	sass({
		outputStyle : 'expanded',
		indentType  : 'tab',
		indentWidth : 1,
		importer    : sassglob,
		includePaths: [ `${__dirname}/styles` ]
	}),
	postcss([
		autoprefixer(),
		cssinlinesvg({
			paths: [ __dirname ]
		}),
		cssurl({
			url: url => url.relativePath === url.url ? `../${url.url}` : url.url
		}),
		csseasings(),
		cssmqpacker({
			sort: cssmqsorter
		}),
		cssreporter({
			clearReportedMessages: true
		})
	]),
	PARAMS.minify ? cleancss({ level: 2 }) : sourcemaps.write( '.', {
		includeContent: false,
		sourceRoot: '../styles'
	}),

	gulp.dest( 'dist' ),
	browsersync.stream(),

	error => {
		done( handleError( error ) );
	});
}
styles.flags = {
	'--minify': false
};

function js( done ) {
	pump( gulp.src( 'js/*.js' ),

	PARAMS.minify ? through.obj() : sourcemaps.init(),
	include({
		extensions: 'js'
	}),
	buble(),
	PARAMS.minify ? uglify() : sourcemaps.write( '.', {
		includeContent: false,
		sourceRoot: '../js'
	}),

	gulp.dest( 'dist' ),
	browsersync.stream(),

	error => {
		done( handleError( error ) );
	});
}
js.flags = {
	'--minify': false
};

function dev() {
	let config;

	try {
		config = require( './browsersync.json' );
	} catch ( e ) {}

	if ( PARAMS.proxy || config && PARAMS.sync !== false ) {
		browsersync.init( Object.assign( {}, config, PARAMS ), () => {
			qrcode.generate( browsersync.instance.options.get( 'urls' ).get( 'external' ) );
		});
	}

	gulp.watch( 'styles/**/*.scss', styles );
	gulp.watch( 'js/**/*.js', js );
	gulp.watch( '**/*.{php,svg,jpg,gif,woff,woff2}' ).on( 'change', browsersync.reload );
}
dev.flags = {
	'--minify'  : false,
	'--proxy'   : 'Quick run Browsersync for a host',
	'--no-sync' : 'Disable Browsersync',
	'--[option]': 'Any Browsersync option'
};

function handleError( error ) {
	if ( ! error ) return;

	let message = error.message;

	if ( error.file && error.messageOriginal ) {
		message = [
			error.file,
			error.line,
			error.column
		]
		.filter( Boolean )
		.join( ':' ) + '\n' + error.messageOriginal;
	}

	notifier.notify({
		title  : error.plugin || 'gulp',
		message: stripansi( message.replace( __dirname + '/', '' ) )
	});

	if ( error.file ) message = message.replace( error.file, chalk.underline( error.file ) );
	message = message.replace( __dirname + '/', '' ).replace( /\n+ */, '\n           ' );

	error.message  =
	error.stack    = message;
	error.toString = () => {
		return message;
	};

	return error;
}
