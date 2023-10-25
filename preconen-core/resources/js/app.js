import './bootstrap';


import Alpine from 'alpinejs';

import * as dz from "dropzone";


window.Dropzone = dz.Dropzone
window.Alpine = Alpine;

Alpine.start();
export default Dropzone
