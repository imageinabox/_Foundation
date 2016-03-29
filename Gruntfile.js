/**
 * Created by justingivens on 2/18/15.
 */
module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                includePaths: ['bower_components/foundation/scss' , 'bower_components/foundation-icons']
            },
            dist: {
                options: {
                    outputStyle: 'compressed'
                },
                files: {
                    'css/app.<%= pkg.version %>.min.css': 'scss/app.scss',
                    'css/login.css': 'scss/login.scss',
                    'css/ie.css': 'scss/ie.scss',
                    'editor-style.css': 'scss/editor.scss'
                }
            }
        },

        copy: {
            scripts: {
                expand: true,
                cwd: 'bower_components/',
                src: '**/*.js',
                dest: 'js'
            },

            maps: {
                expand: true,
                cwd: 'bower_components/',
                src: '**/*.map',
                dest: 'js'
            }
        },

        uglify: {
            /*modernizr: {
             dist: {
             files: {
             'js/modernizr/modernizr.min.js': ['js/modernizr/modernizr.js']
             }
             }
             },*/
            minify: {
                src: 'js/app.js',
                dest: 'js/app.<%= pkg.version %>.min.js'
            }
        },

        concat: {
            options: {
                separator: '' + grunt.util.linefeed,
                stripBanners: true
            },
            dist: {
                src: [
                    'js/foundation/js/foundation.min.js',
                    'js/custom/iiab/*.js',
                    'js/custom/*.js'
                ],
                dest: 'js/app.js'
            }

        },

        watch: {
            grunt: {files: ['Gruntfile.js']},

            sass: {
                files: 'scss/**/*.scss',
                tasks: ['sass']
            },
            concat: {
                files: ['js/custom/*.js'],
                tasks: ['concat']
            },
            uglify: {
                files: 'js/app.js',
                tasks: ['uglify:minify']
            }
        }
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('build', ['sass', 'copy', 'concat', 'uglify:minify']); //'uglify:modernizr',
    grunt.registerTask('default', ['build', 'watch']);

};