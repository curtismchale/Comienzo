module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
	  dist: {
		  options: {
			style: 'compressed'
		  },
		  files: {
			'style.css': 'style.scss'
		  }
		}
	},
	watch: {
		sass: {
			files: ['style.scss', 'assets/css/*.scss'],
			tasks: ["sass"]
		},
	}
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['sass']);

};
