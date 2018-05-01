"use strict";

// charge le module gulp dans une variable gulp
var gulp = require('gulp');
// charge le module gulp-sass dans une variable sass
var sass = require('gulp-sass');
// charge le module cssnano (minify) dns une variable cssnano
var cssnano = require('gulp-cssnano');

var moduleImporter = require('sass-module-importer');

var rename = require('gulp-rename');

// on charge le module imagemin pour minifier les images intégrées dans src
const imagemin = require('gulp-imagemin');

// on déclare une tache sass, qui appelle une fonction anonyme
gulp.task('sass', function () {
    // récupère tous les fichiers depuis le dossier sass/**/
    return gulp.src('./src/sass/*.scss')
    // méthode pipe créée parv gulp: si il y a une erreur de compliation, ça affiche une erreur dans la ligne de commandes
        .pipe(sass().on('error', sass.logError))
        // envoie notre sass complié en css
        .pipe(gulp.dest('./assets/css'))
        // récupère les partiels sass en css
        .pipe(sass({ importer: moduleImporter() }))
        .pipe(gulp.dest('./assets/css'))
        // .pipe(gulp.dest('./css'))
        .pipe(cssnano())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./assets/css'));
});
//js
var uglify = require('gulp-uglify');
var pump = require('pump');

gulp.task('compress', function (cb) {
    pump([
            gulp.src('./src/js/*.js'),
            uglify(),
            gulp.dest('./assets/js')
        ],
        cb
    );
});

//images
gulp.task('minimage', () =>
    gulp.src('./src/img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('./assets/img'))
);

// dès qu'on écrit gulp dans la ligne de commande, il exécute la fonction sass et cssnano
gulp.task('default', function(){
    gulp.watch('./src/sass/*.scss', ['sass']);
    gulp.watch('./src/js/*.js' , ['compress']);
    gulp.watch('./src/img/*' , ['minimage']);
});

/**
 * Created by Eugénie on 30/01/18
 */
