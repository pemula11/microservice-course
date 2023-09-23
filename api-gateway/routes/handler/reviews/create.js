const apiAdapter = require('../../apiAdapter');

const {
    URL_SERVICE_COURSE,
} = process.env

const api = apiAdapter(URL_SERVICE_COURSE);

module.exports = async (req, res) => {
    try {

        const userId = req.user.data.id;
        const review = await api.post('/api/review', {
            user_id: userId,
            ...req.body
        });
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