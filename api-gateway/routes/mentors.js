const express = require('express');
const router = express.Router();

const mentorsHandler = require('./handler/mentors');

/* GET users listing. */
router.get('/', mentorsHandler.getAll);
router.get('/:id', mentorsHandler.get);
router.put('/:id', mentorsHandler.update);
router.delete('/:id', mentorsHandler.destroy);
router.post('/', mentorsHandler.create);



module.exports = router;
