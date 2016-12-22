module.exports = function (grunt) {

    grunt.loadNpmTasks('grunt-wiredep');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({
        wiredep: {
            task: {
                src: ['index.php']
            }
        },
        watch: {
            files: ['bower_components/*'],
            tasks: ['wiredep']
        }
    });

    grunt.registerTask('changes', ['watch']);
    grunt.registerTask('default', ['wiredep']);

};