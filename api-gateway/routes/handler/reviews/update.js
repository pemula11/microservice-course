const apiAdapter = require('../../apiAdapter');

const {
    URL_SERVICE_COURSE,
} = process.env

const api = apiAdapter(URL_SERVICE_COURSE);

module.exports = async (req, res) => {
    try {

        const id = req.params.id;
        const review = await api.put(`/api/review/${id}`, req.body);
        return res.json(review.data);
    } catch (error) {

        if (error.code === 'ECONNREFUSED' || error.code ===  'ECONNABORTED'){
            return res.status(500).json({status: 'error', message: 'service unavaliable'})
        }
        console.log(error);
        const { status,data} = error.response;
        return res.status(status).json(data);
    }
}