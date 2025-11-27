import { create } from 'zustand'

type OverviewStore = {
  totalMembers: number;
  activeMembers: number;
  inactiveMembers: number;
  actions: {
    setTotalMembers: (totalMembers: number) => void;
    setActiveMembers: (activeMembers: number) => void;
    setInactiveMembers: (inactiveMembers: number) => void;
  }
}

const useMemberStore = create<OverviewStore>()((set) => ({
  totalMembers: 0,
  activeMembers: 0,
  inactiveMembers: 0,
  actions: {
    setTotalMembers: (totalMembers: number) => set({ totalMembers }),
    setActiveMembers: (activeMembers: number) => set({ activeMembers }),
    setInactiveMembers: (inactiveMembers: number) => set({ inactiveMembers }),
  }
}))

export const useOverviewActions = () => useMemberStore((state) => state.actions)
export const useOverviewTotalMembers = () => useMemberStore((state) => state.totalMembers)
export const useOverviewActiveMembers = () => useMemberStore((state) => state.activeMembers)
export const useOverviewInactiveMembers = () => useMemberStore((state) => state.inactiveMembers)