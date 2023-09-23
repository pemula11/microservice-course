const apiAdapter = require('../../apiAdapter');

const {
    URL_SERVICE_COURSE,
} = process.env

const api = apiAdapter(URL_SERVICE_COURSE);

module.exports = async (req, res) => {
    try {

        const userId = req.user.data.id;
        const mycourses = await api.get('/api/mycourses', {
            params: { user_id : userId}
        });
        return res.json(mycourses.data);
    } catch (error) {

        if (error.code === 'ECONNREFUSED' || error.code ===  'ECONNABORTED'){
            return res.status(500).json({status: 'error', message: 'service unavaliable'})
        }
        console.log(error);
        const { status,data} = error.response;
        return res.status(status).json(data);
    }
}