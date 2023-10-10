const express = require('express');
const router = express.Router();
const verifyToken = require('../middleware/verifyToken')
const can = require('../middleware/permission')

coursesHandler = require('./handler/courses')
/* GET users listing. */
router.get('/', coursesHandler.getAll);
router.get('/:id', coursesHandler.get);
router.post('/', verifyToken, can('admin'), coursesHandler.create);
router.put('/:id', verifyToken, can('admin', 'student'), coursesHandler.update);
router.delete('/:id', verifyToken, can('admin'), coursesHandler.destroy);

module.exports = router;
