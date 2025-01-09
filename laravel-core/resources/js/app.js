import './bootstrap';

import Alpine from 'alpinejs';

import Swiper from 'swiper/bundle';

import $ from "jquery";
import jQuery from 'jquery';

import 'jquery.easing/jquery.easing';

window.Alpine = Alpine;

Alpine.start();

import.meta.glob([ 
    '../images/**',
    '../fonts/**',
  ]);
