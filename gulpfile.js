'use strict';

 // charge le module gulp dans une variable gulp
var gulp = require('gulp');
// charge le module gulp-sass dans une variable sass
var sass = require('gulp-sass');
// charge le module cssnano (minify) dns une variable cssnano
var cssnano = require('gulp-cssnano');

var moduleImporter = require('sass-module-importer');

var rename = require('gulp-rename');

// on déclare une tache sass, qui appelle une fonction anonyme 
gulp.task('sass', function () {
	// récupère tous les fichiers depuis le dossier sass/**/
  return gulp.src('./sass/*.scss')
  	// méthode pipe créée parv gulp: si il y a une erreur de compliation, ça affiche une erreur dans la ligne de commandes
    .pipe(sass().on('error', sass.logError))
   	// envoie notre sass complié en css dans le dossier /css
    .pipe(gulp.dest('./css'))
    // récupère les partiels sass en css
    .pipe(sass({ importer: moduleImporter() }))
    .pipe(gulp.dest('./css'))
    // .pipe(gulp.dest('./css'))
    .pipe(cssnano())
    .pipe(rename({
            suffix: '.min'
        }))
    .pipe(gulp.dest('./css'));
});


// dès qu'on écrit gulp dans la ligne de commande, il exécute la fonction sass et cssnano
gulp.task('default', function(){
	gulp.watch('./sass/*.scss', ['sass']);
});