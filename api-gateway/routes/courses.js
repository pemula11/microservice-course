const express = require('express');
const router = express.Router();
const verifyToken = require('../middleware/verifyToken')

coursesHandler = require('./handler/courses')
/* GET users listing. */
router.get('/', coursesHandler.getAll);
router.get('/:id', coursesHandler.get);
router.post('/', verifyToken, coursesHandler.create);
router.put('/:id', verifyToken, coursesHandler.update);
router.delete('/:id', verifyToken, coursesHandler.destroy);

module.exports = router;
