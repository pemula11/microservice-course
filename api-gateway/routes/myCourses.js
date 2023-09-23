const express = require('express');
const router = express.Router();

const myCourseHandler = require('./handler/my-courses');

/* GET users listing. */

router.get('/', myCourseHandler.get);
router.post('/', myCourseHandler.create);

module.exports = router;
