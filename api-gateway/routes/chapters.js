const express = require('express');
const router = express.Router();
const verifyToken = require('../middleware/verifyToken')

chapterHandler = require('./handler/chapters');
/* GET users listing. */
router.get('/:id', chapterHandler.get);
router.get('/', chapterHandler.getAll);
router.post('/', chapterHandler.create);
router.put('/:id', chapterHandler.update);
router.delete('/:id', chapterHandler.destroy);

module.exports = router;
