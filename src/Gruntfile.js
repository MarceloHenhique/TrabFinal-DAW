"use strict";

module.exports = function( grunt ) {

	// Load all tasks
	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

	grunt.initConfig({

		// Watch
		watch: {
			css: {
				files: [
					'../assets/sass/**/*.scss'
				],
				tasks: [ 'compass', 'beep' ]
			},
			js: {
				files: [
					'../assets/vendor/js/*.js',
					'../assets/js/**/**/*.js',
					'!../assets/vendor/js/angular.min.js'
				],
				tasks: [ 'uglify', 'beep' ]
			}
		},

		// Compile scss
		compass: {
			dist: {
				options: {
					force: true,
					config: 'config.rb',
					outputStyle: 'compressed'
				}
			}
		},

		// Concat and minify javascripts
		uglify: {
			options: {
				mangle: false,
				compress: false,
				beautify: true
			},
			dist: {
				files: {
					'../build/js/app.min.js': [
						'../assets/vendor/js/*.js',
						'../assets/js/**/**/*.js',
						'!../assets/vendor/js/angular.min.js'
					]
				}
			}
		},

	});

	// registrando tarefa default
	grunt.registerTask( 'default', [ 'watch' ] );

};
