module.exports = function(grunt) {
    grunt.initConfig({

        uglify : {
            main: {
                options : {
                    mangle : false
                    ,beautify: true
                    ,sourceMap: true
                    ,sourceMapName: 'front/publicos/javascripts/script.map'
                },
                files: {
                    'front/publicos/javascripts/script.min.js' : [
                        'front/publicos/javascripts/modulos/*.js'
                        ,'front/publicos/javascripts/**/*.js'
                        ,'!front/publicos/javascripts/script.min.js'
                    ]
                }
            }
        }


        ,sass_globbing: {
            main: {
                files: {
                        'front/publicos/estilos/sass/estilo.scss': [
                        'front/publicos/estilos/sass/vars/_*.scss'
                        ,'front/publicos/estilos/sass/mixins/_*.scss'
                        ,'front/publicos/estilos/sass/views/_reset-mobile.scss'
                        ,'front/publicos/estilos/sass/views/**/*.scss'
                        ,'!front/publicos/estilos/sass/estilo.scss'
                    ]
                }
            }
        }

        ,sass : {

            main : {
                options : { style : 'compressed' },
                files : {
                    'front/publicos/estilos/estilo.css' : 'front/publicos/estilos/sass/estilo.scss'
                }
            }

        }

        ,watch : {
            js:  {
                files: ['front/publicos/javascripts/**/*.js', '!front/publicos/javascripts/script.min.js']
                , tasks: [ 'uglify' ]
            },
            sass:  { files: 'front/publicos/estilos/sass/**/*.scss', tasks: [ 'sass_globbing', 'sass' ] }
        }

        ,exec: {

        }


    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-sass-globbing');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');


    grunt.loadNpmTasks('grunt-exec');


    grunt.registerTask('css',['sass_globbing','sass']);
    grunt.registerTask('js',['uglify']);
    grunt.registerTask('default',['js', 'uglify','css']);
    grunt.registerTask('deploy',['exec']);
    grunt.registerTask('w',['default','watch']);

};
