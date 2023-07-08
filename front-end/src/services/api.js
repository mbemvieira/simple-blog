const API_URL = 'http://localhost:80/api';

export const getComments = async () => {
    const response = await fetch(`${API_URL}/comments`, {
        method: 'GET',
    });

    return response.json();
};

export const createComment = async (comment) => {
    const response = await fetch(`${API_URL}/comments`, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(comment),
    });

    if (!response.ok) {
        throw new Error('Validation error');
    }

    return response.json();
};
