import NaverMap from './NaverMap.tsx'

const Main = () => {
    return (
        <div className="w-screen h-screen relative">
            <NaverMap id="main-naver-map"/>
            <div className="fixed top-0 right-0 z-10000">
                <input type="text" className="input max-w-sm" aria-label="input"/>
            </div>
        </div>
    )
}

export default Main
