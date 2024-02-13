<?php

foreach ( new RecursiveIteratorIterator( new RecursiveDirectoryIterator( __dir__ . '/app' ) ) as $file ) {
	if ( $file->getExtension() === 'php' ) {
		require_once $file->getPathname();
	}
}
